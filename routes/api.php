<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YahooFinanceController;
use App\Http\Controllers\ClaimsController;
use App\Http\Controllers\CompaniesHouseController;
use App\Http\Controllers\TaxController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/yahoofinance/get/{code?}', [YahooFinanceController::class, 'get']);
Route::post('/yahoofinance/post', [YahooFinanceController::class, 'post']);
Route::post('/claims/post', [ClaimsController::class, 'post']);
Route::post('/companieshouse/post', [CompaniesHouseController::class, 'post']);

Route::post('/companieshouse/convert', [CompaniesHouseController::class, 'fnolLink']);

Route::post('/tax/surplus', [TaxController::class, 'surplus']);