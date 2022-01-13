<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiSearchController;
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

Route::get('SearchVatID/{vatId}',[ApiSearchController::class, 'searchBusnessId']);
Route::get('SearchByName/{name}',[ApiSearchController::class,'SearchByName']);
Route::get('SearchByDates/{from}/{to}',[ApiSearchController::class,'SearchTimeFrame']);
