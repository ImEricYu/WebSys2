<?php

use App\Http\Controllers\CalculationController; // Gamitin ang CalculationController mula sa App\Http\Controllers
use Illuminate\Support\Facades\Route; // Gamitin ang Route facade para sa pagdedefine ng mga routes

// Magdefine ng route na kumukuha ng anim na parameter: operation1, val1, val2, operation2, val3, val4
// Kapag na-access ang route na ito, tatawagin ang 'compute' method ng CalculationController
Route::get('/{operation1}/{val1}/{val2}/{operation2}/{val3}/{val4}', [CalculationController::class, 'compute']);
