<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Mail\MoneyReceived;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Interfaces\TransactionRepositoryInterface;
use App\Interfaces\CurrencyConversionRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Validator;
use Log;

class TransactionController extends BaseController 
{
    private TransactionRepositoryInterface $transactionRepository;
    private CurrencyConversionRepositoryInterface $currencyConversionRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository,
        CurrencyConversionRepositoryInterface $currencyConversionRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->currencyConversionRepository = $currencyConversionRepository;
        $this->userRepository = $userRepository;
    }

    public function sendMoney(Request $request): JsonResponse
    {
        /* Validation start */
        $validator = Validator::make($request->all(), [
            'receiver_id' => 'required|integer',
            'amount' => 'required|numeric|gt:0',
        ]);
        if ($validator->fails()) {
            return $this->validationError($validator->errors());
        }
        /* Validation end */

        /* Send Money start */
        $receiverId = $request->receiver_id;
        $sendingAmount = $request->amount;

        $sender = $this->userRepository->getAuthUser();
        $receiver = $this->userRepository->getUserById($receiverId);

        if ($sender->id == $receiver->id) {
            return $this->errorResponse('You can not send the money to your own wallet');
        } else if ($sender->wallet < $sendingAmount) {
            return $this->errorResponse('Insufficient wallet balance');
        } else {
            $logData = [
                'sender_id' => $sender->id,
                'receiver_id' => $receiver->id,
                'amount' => $sendingAmount,
            ];

            try {
                Log::info('User attempt to send money', $logData);

                /* Currency Conversion start */
                if ($sender->currency != $receiver->currency) {
                    $currencyConversion = $this->currencyConversionRepository->getCurrencyConversionData($sender->currency, $receiver->currency, $sendingAmount);
                    
                    if ($currencyConversion->successful()) {
                        $receivingAmount = $currencyConversion->object()->result;
                    } else {
                        $error = $currencyConversion->clientError() ? $currencyConversion->object()->message : 'Currency conversion server not connected';
                        $logData['error'] = $error;
                        Log::error('User transaction failed', $logData);

                        return $this->errorResponse($error, [], $currencyConversion->status());
                    }
                } else {
                    $receivingAmount = $sendingAmount;
                }
                /* Currency Conversion end */

                /* Transaction start */
                DB::beginTransaction();
                try {
                    $senderWallet = $sender->wallet-$sendingAmount;
                    $receiverWallet = $receiver->wallet+$receivingAmount;

                    $this->userRepository->updateUser($sender->id, ['wallet' => $senderWallet]);
                    $this->userRepository->updateUser($receiver->id, ['wallet' => $receiverWallet]);
                    $data = $this->transactionRepository->createTransaction([
                        'sender_user_id' => $sender->id,
                        'sender_currency' => $sender->currency,
                        'sending_amount' => $sendingAmount,
                        'receiver_user_id' => $receiver->id,
                        'receiver_currency' => $receiver->currency,
                        'receiving_amount' => $receivingAmount,
                        'transaction_at' => now(),
                    ]);
                    DB::commit();

                    /* Mail start */
                    $receiver->wallet = $receiverWallet;
                    Mail::to($receiver->email)->send(new MoneyReceived($sender, $receiver, $data));
                    /* Mail end */

                    Log::info('User transaction successfully done', $data->toArray());

                    return $this->successResponse('Send money successfully done', $data);
                } catch (\Exception $e) {
                    DB::rollback();

                    $logData['error'] = $e->getMessage();
                    Log::error('User transaction failed', $logData);

                    return $this->errorResponse($e->getMessage());
                }
                /* Transaction end */
            } catch (\Exception $e) {
                $logData['error'] = $e->getMessage();
                Log::error('User transaction failed', $logData);

                return $this->errorResponse($e->getMessage());
            }
        }
        /* Send Money end */
    }

    public function userTransactionInfo(): JsonResponse
    {
        $user = $this->userRepository->getAuthUser();

        $sendingConvertedAmount = $this->currencyConversionRepository->getTotalSendingAmountByUserId($user->id);
        $receivingConvertedAmount = $this->currencyConversionRepository->getTotalReceivingAmountByUserId($user->id);
        $thirdHighestTransaction = $this->transactionRepository->getThirdHighestTransactionByUserId($user->id);

        return $this->successResponse('User Transaction Info', [
            'name' => $user->name,
            'email' => $user->email,
            'currency' => $user->currency,
            'current_wallet' => $user->wallet,
            'converted_amount_by_sending' => $sendingConvertedAmount,
            'converted_amount_by_receiving' => $receivingConvertedAmount,
            'total_converted_amount' => $sendingConvertedAmount+$receivingConvertedAmount,
            'third_highest_transaction_amount' => !empty($thirdHighestTransaction) ? $thirdHighestTransaction[0]->transactionAmount : 0,
        ]);
    }

    public function userTransactionHistory(Request $request): JsonResponse
    {
        $page = $request->page;
        $perPage = ($request->per_page>0) ? $request->per_page : 10;
        $user = $this->userRepository->getAuthUser();

        $transactionHistory = $this->transactionRepository->getTransactionHistory($perPage, $user->id);

        return $this->successResponse('User Transaction History', $transactionHistory);
    }
}
