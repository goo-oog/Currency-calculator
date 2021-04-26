<?php

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
Route::get('/currency/{symbol}', [AppController::class, 'getRate']);
Route::get('/bank', [AppController::class, 'getRatesFromBank']);