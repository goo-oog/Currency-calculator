<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\Services\BankService;
use App\Services\ShowCurrencyRequest;
use App\Services\ShowCurrencyService;
use Illuminate\Console\Command;

class GetRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:show {symbol}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show currency rate';
    private ShowCurrencyService $currencyService;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ShowCurrencyService $showCurrencyService)
    {
        parent::__construct();
        $this->currencyService=$showCurrencyService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $currency = $this->currencyService->find($this->argument('symbol'));
        echo "{$currency->getAttributes()['symbol']}\t{$currency->getAttributes()['rate']}";
        return 0;
    }
}
