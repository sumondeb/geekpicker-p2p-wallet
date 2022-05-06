<?php

namespace App\Interfaces;

interface CurrencyConversionRepositoryInterface
{
    public function getCurrencyConversionData(string $fromCurrency, string $toCurrency, float $amount);
    public function getMostConversion();
    public function getTotalSendingAmountByUserId(int $userId);
    public function getTotalReceivingAmountByUserId(int $userId);
}
