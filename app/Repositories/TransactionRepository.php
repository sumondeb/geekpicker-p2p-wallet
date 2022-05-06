<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function createTransaction(array $transactionDetails)
    {
        return Transaction::create($transactionDetails);
    }

    public function getThirdHighestTransactionByUserId(int $userId)
    {
        $sql = "SELECT transactionAmount FROM ";
        $sql .= "(SELECT `sending_amount` AS transactionAmount FROM `transactions` WHERE `sender_user_id`=$userId ";
        $sql .= "UNION ALL ";
        $sql .= "SELECT `receiving_amount` AS transactionAmount FROM `transactions` WHERE `receiver_user_id`=$userId) temp ";
        $sql .= "ORDER BY transactionAmount DESC LIMIT 2, 1";

        return DB::select($sql);
    }

    public function getTransactionHistory(int $perPage, int $userId=0)
    {
        $data = Transaction::select('transactions.*', DB::raw('senderUsers.name as senderName, receiverUsers.name as receiverName'))
            ->join(DB::raw('users senderUsers'), 'transactions.sender_user_id', '=', 'senderUsers.id')
            ->join(DB::raw('users receiverUsers'), 'transactions.receiver_user_id', '=', 'receiverUsers.id');
        if ($userId>0) {
            $data->where(function ($query) use ($userId) {
                $query->where('transactions.sender_user_id', $userId)
                    ->orWhere('transactions.receiver_user_id', $userId);
            });
        }
        return $data->orderBy('id', 'desc')->paginate($perPage);
    }
}
