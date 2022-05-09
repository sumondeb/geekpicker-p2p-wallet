<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Interfaces\CurrencyConversionInterface;
use App\Interfaces\UserInterface;

class CurrencyConversionController extends Controller 
{
    private CurrencyConversionInterface $currencyConversionRepository;
    private UserInterface $userRepository;

    public function __construct(
        CurrencyConversionInterface $currencyConversionRepository,
        UserInterface $userRepository
    ) {
        $this->currencyConversionRepository = $currencyConversionRepository;
        $this->userRepository = $userRepository;
    }

    public function mostConversion(): View
    {
        $mostConversion = $this->currencyConversionRepository->getMostConversion();
        $data['mostConversion'] = $mostConversion;

        if(!empty($mostConversion)) {
            $data['mostConversionUser'] = $this->userRepository->getUserById($mostConversion->sender_user_id);
        }

        return view('mostConversion', $data);
    }
}
