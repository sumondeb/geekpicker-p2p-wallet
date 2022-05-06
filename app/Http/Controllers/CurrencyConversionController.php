<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Interfaces\CurrencyConversionRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class CurrencyConversionController extends Controller 
{
    private CurrencyConversionRepositoryInterface $currencyConversionRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(
        CurrencyConversionRepositoryInterface $currencyConversionRepository,
        UserRepositoryInterface $userRepository
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
