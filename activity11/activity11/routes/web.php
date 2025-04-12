<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

use App\Http\Controllers\BookController;

Route::resource('books', BookController::class);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
