<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DbTablesController;
use App\Http\Controllers\AssetsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/icons', function () {
    return view('icons');
});

Route::get('/assets', [AssetsController::class, 'details']);
Route::get('/comments', [AssetsController::class, 'comments']);

Route::get('/dbdocs/tables', [DbTablesController::class, 'getTables']);
Route::get('/dbdocs/columns', [DbTablesController::class, 'getColumns']);
Route::get('/dbdocs/comments', [DbTablesController::class, 'getComments']);