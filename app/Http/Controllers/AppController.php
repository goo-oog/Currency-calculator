<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\BankService;
use App\Services\ConversionService;
use App\Services\CurrencyPropertiesService;
use App\Services\ShowCurrencyService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TypeError;

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
        $this->bank->getRates();
        $bladeVariables = [
            'currencies' => $this->currencyService->all(),
            'props' => $this->props,
            'outcome' => ''
        ];
        if ($request->method() === 'POST') {
            try {
                $outcome = $this->conversion->do(
                    $this->currencyService->find($request->input('symbol')),
                    ($request->input('amount') ?? '0')
                );
            } catch (TypeError $e) {
                $request->flush();
                header('Location: /');
                exit();
            }
            $bladeVariables['outcome'] = $outcome ?? '';
            $bladeVariables['selectedSymbol'] = $request->input('symbol') ?? 'AUD';
            $bladeVariables['chosenAmount'] = $request->input('amount') ?? '0';
        }
        return view('main', $bladeVariables);
    }

    // experimental alternative to display single currency rate
    public function getRate(string $symbol): View
    {
        $this->bank->getRates();
        $currency = $this->currencyService->find($symbol);
        return view('currency', $currency);
    }
}