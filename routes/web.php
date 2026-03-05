<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetController;






Route::get('/', [GetController::class, 'index'])->name('index');

Route::get('/mda/admin/login', [GetController::class, 'loginAdmin'])->name('admin.login');
Route::post('/mda/admin/login', [App\Http\Controllers\Admin\AdminController::class, 'login'])->name('login');


Route::middleware('auth:admin')->group(function () {

    Route::get('/mda/admin/dashboard', [GetController::class, 'dashboardAdmin'])
        ->name('admin.dashboard');

    Route::post('/mda/admin/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])
        ->name('admin.logout');

});

