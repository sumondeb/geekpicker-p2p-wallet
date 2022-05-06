<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function createTransaction(array $transactionDetails);
    public function getThirdHighestTransactionByUserId(int $userId);
    public function getTransactionHistory(int $perPage, int $userId=0);
}
