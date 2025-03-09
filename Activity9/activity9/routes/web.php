<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/insert', [UserController::class, 'insertform'])->name("insert");
Route::post('/create', [UserController::class, 'insert'])->name("create");
Route::get('/', [UserController::class, 'index'])->name("home");
Route::post('/edit/{id}', [UserController::class, 'edit'])->name("edit");
Route::get('/edit/{id}', [UserController::class, 'showEdit'])->name("showEdit");
Route::get('/delete/{id}', [UserController::class, 'destroy'])->name("delete");
