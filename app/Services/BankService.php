<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Currency;

class BankService
{
    public function getRates(): void
    {
        if (Currency::select('updated_at')->where('symbol', '=', 'AUD')->exists()) {
            if (Currency::find('AUD')->updated_at->isCurrentHour()) {
                return;
            }
        }
        $xmlObject = simplexml_load_string(file_get_contents('https://www.bank.lv/vk/ecb.xml'));
        $json = json_encode($xmlObject);
        $currencies = json_decode($json)->Currencies->Currency;
        foreach ($currencies as $currency) {
            Currency::upsert(
                ['symbol' => $currency->ID, 'rate' => $currency->Rate],
                'symbol',
                ['rate']);
        }
    }
}