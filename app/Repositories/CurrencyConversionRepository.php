<?php

namespace App\Repositories;

use App\Interfaces\CurrencyConversionRepositoryInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

class CurrencyConversionRepository implements CurrencyConversionRepositoryInterface
{
    private string $apikey;

    public function __construct()
    {
        $this->apikey = is_null(env('CURRENCY_CONVERSION_API_KEY')) ? '' : env('CURRENCY_CONVERSION_API_KEY');
    }

    public function getCurrencyConversionData(string $fromCurrency, string $toCurrency, float $amount)
    {
        return Http::accept('application/json')
        ->withHeaders(['apikey' => $this->apikey])
        ->get('https://api.apilayer.com/currency_data/convert', [
            'from' => $fromCurrency,
            'to' => $toCurrency,
            'amount' => $amount,
        ]);
    }

    public function getMostConversion()
    {
        return Transaction::select('sender_user_id', DB::raw('count(id) as conversionQuantity'))
            ->whereRaw('sender_currency != receiver_currency')
            ->groupBy('sender_user_id')
            ->orderBy('conversionQuantity', 'desc')
            ->first();
    }

    public function getTotalSendingAmountByUserId(int $userId)
    {
        return Transaction::whereRaw('sender_currency != receiver_currency')
            ->where('sender_user_id', $userId)
            ->sum('sending_amount');
    }

    public function getTotalReceivingAmountByUserId(int $userId)
    {
        return Transaction::whereRaw('sender_currency != receiver_currency')
            ->where('receiver_user_id', $userId)
            ->sum('receiving_amount');
    }
}
