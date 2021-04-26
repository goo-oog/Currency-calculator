<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Currency;

class ConversionService
{
    public function do(Currency $currency, float $amount): string
    {
        return (string)round($currency->rate * $amount, 2);
    }
}