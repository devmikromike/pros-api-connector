<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiSearchController;


Route::get('/', function () {
    return view('welcome');
});

//Route::get('SearchVatID/{vatId}',[ApiSearchController::class, 'searchBusnessId']);
//Route::get('SearchByName/{name}',[ApiSearchController::class,'SearchByName']);
//Route::get('SearchByDates/{from}/{to}',[ApiSearchController::class,'SearchTimeFrame']);
