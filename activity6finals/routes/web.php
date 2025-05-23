<?php

use App\Http\Controllers\CatController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CatController::class, 'getCatImage'])->name('cat');
