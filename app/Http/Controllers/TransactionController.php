<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Interfaces\TransactionRepositoryInterface;
use App\Interfaces\CurrencyConversionRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class TransactionController extends Controller 
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

    public function userTransactionInfo(Request $request): View
    {
        $user_id = $request->user;
        $data['user_id'] = $user_id;
        $data['allUsers'] = $this->userRepository->getAllUsers();

        $userInfo = '';
        if($user_id>0) {
            $userInfo = $this->userRepository->getUserById($user_id);
            $data['sendingConvertedAmount'] = $this->currencyConversionRepository->getTotalSendingAmountByUserId($user_id);
            $data['receivingConvertedAmount'] = $this->currencyConversionRepository->getTotalReceivingAmountByUserId($user_id);
            $data['thirdHighestTransaction'] = $this->transactionRepository->getThirdHighestTransactionByUserId($user_id);
        }
        $data['userInfo'] = $userInfo;

        return view('userTransactionInfo', $data);
    }
    
    public function transactionHistory(Request $request): View
    {
        $page = $request->page;
        $perPage = 10;
        $data['sl'] = ($page>1) ? ($page-1)*$perPage+1 : 1;

        $data['transactionHistory'] = $this->transactionRepository->getTransactionHistory($perPage);

        return view('transactionHistory', $data);
    }
}
