<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Currency;

class ConversionService
{
    public function do(Currency $currency, string $amount): string
    {
        $amount = str_replace(',', '.', $amount);
        return str_replace('.', ',', sprintf('%0.2f', $currency->rate * $amount));
    }
}