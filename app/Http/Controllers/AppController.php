<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\BankService;
use App\Services\ConversionService;
use App\Services\CurrencyPropertiesService;
use App\Services\ShowCurrencyService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppController extends Controller
{
    private BankService $bank;
    private ShowCurrencyService $currencyService;
    private CurrencyPropertiesService $props;
    private ConversionService $conversion;

    public function __construct(
        BankService $bank,
        ShowCurrencyService $currencyService,
        CurrencyPropertiesService $props,
        ConversionService $conversion
    )
    {
        $this->bank = $bank;
        $this->currencyService = $currencyService;
        $this->props = $props;
        $this->conversion = $conversion;
    }

    public function main(Request $request): View
    {
        $bladeVariables = [
            'currencies' => $this->currencyService->all(),
            'props' => $this->props
        ];
        if ($request->method() === 'POST') {
            $result = $this->conversion->do(
                $this->currencyService->find($request->post('symbol')),
                (float)($request->post('amount') ?? 0)
            );
            $bladeVariables['result'] = $result ?? '';
            $bladeVariables['selectedSymbol'] = $request->post('symbol') ?? 'AUD';
            $bladeVariables['chosenAmount'] = $request->post('amount') ?? '0';
        }
        return view('main', $bladeVariables);
    }

    public function getRate(string $symbol): View
    {
        $currency = $this->currencyService->find($symbol);
        return view('currency', $currency);
    }

    public function getRatesFromBank(): void
    {
        $this->bank->getRates();
    }
}