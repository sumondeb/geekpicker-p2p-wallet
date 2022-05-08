<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Tests\TestCase;

class WebCurrencyConversionControllerTest extends TestCase
{
    public function test_most_conversion_return_valid_result(): void
    {
        $expectData = Transaction::select(DB::raw('count(id) as conversionQuantity'))
            ->whereRaw('sender_currency != receiver_currency')
            ->groupBy('sender_user_id')
            ->orderBy('conversionQuantity', 'desc')
            ->first();

        $this->get('/most-conversion')->assertSee($expectData ? $expectData->conversionQuantity : 'No data');
    }
}
