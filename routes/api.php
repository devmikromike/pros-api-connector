<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiSearchController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('SearchVatID/{vatId}',[ApiSearchController::class, 'SearchBusnessId']);
Route::get('SearchByName/{name}',[ApiSearchController::class,'SearchByName']);
Route::get('SearchByDates/{from}/{to}',[ApiSearchController::class,'SearchTimeFrame']);
Route::get('SearchPostalCode/{code}',[ApiSearchController::class, 'SearchPostalCode']);
