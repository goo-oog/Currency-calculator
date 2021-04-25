<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Services\BankService;
use App\Services\ShowCurrencyService;

class AppController extends Controller
{
    private BankService $bank;
    private ShowCurrencyService $currencyService;

    public function __construct(BankService $bank,ShowCurrencyService $currencyService)
    {
        $this->bank=$bank;
        $this->currencyService=$currencyService;
    }

    public function main()
    {
        return view('main');
    }

    public function getRate(string $symbol)
    {
        $currency=$this->currencyService->execute($symbol);
        return view('currency',$currency);
    }

    public function getRatesFromBank():void
    {
        $this->bank->getRates();
    }
}
