<?php

use Illuminate\Support\Facades\Route;

// 1. Import the MoneyController so we can use it in our routes.
use App\Http\Controllers\MoneyController;

// 2. Define a route that listens to URLs like "/money/{amount}".
//    It calls the 'breakdown' method in MoneyController and passes the amount from the URL.
Route::get('/money/{amount}', [MoneyController::class, 'breakdown']);
