<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

class ShowCurrencyService
{
    public function find(string $symbol): Currency
    {
        return Currency::find($symbol);
    }

    public function all(): Collection
    {
        return Currency::all();
    }
}