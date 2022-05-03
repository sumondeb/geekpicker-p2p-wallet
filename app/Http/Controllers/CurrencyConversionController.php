<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CurrencyConversionController extends Controller 
{
    public function mostConversion(): View
    {
        return view('mostConversion');
    }
}
