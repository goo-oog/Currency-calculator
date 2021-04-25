<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Currency;

class ShowCurrencyService
{
    public function execute(string $symbol):Currency
    {
        return Currency::find($symbol);
    }
}