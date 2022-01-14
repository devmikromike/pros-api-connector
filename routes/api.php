<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiSearchController;

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
Route::get('SearchVatID/{vatId}',[ApiSearchController::class, 'searchBusnessId']);
Route::get('SearchByName/{name}',[ApiSearchController::class,'SearchByName']);
Route::get('SearchByDates/{from}/{to}',[ApiSearchController::class,'SearchTimeFrame']);
