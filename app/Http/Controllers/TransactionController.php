<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransactionController extends Controller 
{
    public function userTransactionInfo(): View
    {
        return view('userTransactionInfo');
    }
    
    public function transactionHistory(): View
    {
        return view('transactionHistory');
    }
}
