<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetController;




Route::get('/', [GetController::class, 'index'])->name('get');