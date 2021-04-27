<?php
declare(strict_types=1);

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AppController::class, 'main']);
Route::post('/', [AppController::class, 'main']);

// experimental alternative to display single currency rate
Route::get('/currency/{symbol}', [AppController::class, 'getRate']);