<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DbTablesController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\SchemaController;

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

Route::get('/schema', [SchemaController::class, 'schema']);
Route::get('/schema/structure', [SchemaController::class, 'structure']);
Route::get('/schema/data', [SchemaController::class, 'data']);
Route::get('/schema/ledger', [SchemaController::class, 'ledger']);

Route::get('/dbdocs/tables', [DbTablesController::class, 'getTables']);
Route::get('/dbdocs/columns', [DbTablesController::class, 'getColumns']);
Route::get('/dbdocs/comments', [DbTablesController::class, 'getComments']);