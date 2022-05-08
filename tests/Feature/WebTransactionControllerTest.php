<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Transaction;
use Tests\TestCase;

class WebTransactionControllerTest extends TestCase
{
    public function test_user_transaction_info_no_user_select_no_data()
    {
        $this->get('/user-transaction-info')->assertSee('Select a particular user');
    }

    public function test_user_transaction_info_return_valid_result()
    {
        $user1 = User::factory()->create(['currency' => 'USD']);
        $user2 = User::factory()->create(['currency' => 'EUR']);
        $user3 = User::factory()->create(['currency' => 'USD']);

        Transaction::factory()->create([
            'sender_user_id' => $user1->id,
            'sender_currency' => $user1->currency,
            'sending_amount' => 10,
            'receiver_user_id' => $user2->id,
            'receiver_currency' => $user2->currency,
            'receiving_amount' => 11,
        ]);

        Transaction::factory()->create([
            'sender_user_id' => $user1->id,
            'sender_currency' => $user1->currency,
            'sending_amount' => 20,
            'receiver_user_id' => $user2->id,
            'receiver_currency' => $user2->currency,
            'receiving_amount' => 22,
        ]);

        Transaction::factory()->create([
            'sender_user_id' => $user2->id,
            'sender_currency' => $user2->currency,
            'sending_amount' => 27,
            'receiver_user_id' => $user1->id,
            'receiver_currency' => $user1->currency,
            'receiving_amount' => 30,
        ]);

        Transaction::factory()->create([
            'sender_user_id' => $user2->id,
            'sender_currency' => $user2->currency,
            'sending_amount' => 36,
            'receiver_user_id' => $user1->id,
            'receiver_currency' => $user1->currency,
            'receiving_amount' => 40,
        ]);

        Transaction::factory()->create([
            'sender_user_id' => $user1->id,
            'sender_currency' => $user1->currency,
            'sending_amount' => 50,
            'receiver_user_id' => $user3->id,
            'receiver_currency' => $user3->currency,
            'receiving_amount' => 50,
        ]);

        $sendingConvertedAmount = 30;
        $receivingConvertedAmount = 70;
        $thirdHighestTransaction = 30;

        $response = $this->get("/user-transaction-info?user=$user1->id");
        $response->assertSelectorContains('td#sendingConvertedAmount', number_format($sendingConvertedAmount, 2) . ' ' . $user1->currency)
            ->assertSelectorContains('td#receivingConvertedAmount', number_format($receivingConvertedAmount, 2) . ' ' . $user1->currency)
            ->assertSelectorContains('td#totalConvertedAmount', number_format(($sendingConvertedAmount+$receivingConvertedAmount), 2) . ' ' . $user1->currency)
            ->assertSelectorContains('td#thirdHighestTransaction', number_format($thirdHighestTransaction, 2) . ' ' . $user1->currency);
    }

    public function test_transaction_history_return_valid_result()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $transaction = Transaction::factory()->create([
            'sender_user_id' => $user1->id,
            'sender_currency' => $user1->currency,
            'receiver_user_id' => $user2->id,
            'receiver_currency' => $user2->currency,
        ]);

        $response = $this->get('/transaction-history');
        $response->assertSee($user1->name)
            ->assertSee($user2->name)
            ->assertSee(number_format($transaction->sending_amount, 2) . ' ' . $transaction->sender_currency)
            ->assertSee(number_format($transaction->receiving_amount, 2) . ' ' . $transaction->receiver_currency);
    }
}
