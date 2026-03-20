<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CurrencyService;

class PriceController extends Controller
{
    public function __construct(private readonly CurrencyService $currencyService) {}

    public function getPrice(string $currency, $price): float
    {
        return $this->currencyService->convertToRub($currency, (float) $price);
    }
}
