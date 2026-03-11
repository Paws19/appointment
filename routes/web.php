<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetController;






Route::get('/', [GetController::class, 'index'])->name('index');
Route::post('/book-appointment', [App\Http\Controllers\User\UserController::class, 'bookAppointment'])->name('book.appointment');

Route::get('/mda/admin/login', [GetController::class, 'loginAdmin'])->name('admin.login');
Route::post('/mda/admin/login', [App\Http\Controllers\Admin\AdminController::class, 'login'])->name('login');

Route::get('/email-submitted/{id}', [GetController::class, 'emailSubmitted'])->name('email.submitted');


Route::get('/mda/staff/login', [GetController::class, 'loginStaff'])->name('staff.login');
Route::post('/mda/staff/login', [App\Http\Controllers\Staff\StaffController::class, 'loginStaff'])->name('loginStaff');

Route::get('/mda/staff/dashboard', [GetController::class, 'dashboardStaff'])->name('staff.dashboard');

Route::middleware('auth:admin')->group(function () {

    Route::get('/mda/admin/dashboard', [GetController::class, 'dashboardAdmin'])
        ->name('admin.dashboard');

    Route::post('/mda/admin/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])
        ->name('admin.logout');

    Route::post('/mda/admin/create-staff', [App\Http\Controllers\Admin\AdminController::class, 'CreateStaffAccount'])
        ->name('admin.createStaff');

    Route::delete('/mda/admin/delete-staff/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteAccount'])
        ->name('admin.deleteStaff');

    Route::put('/mda/admin/update-staff/{id}', [App\Http\Controllers\Admin\AdminController::class, 'UpdateStaffAccount'])
        ->name('admin.updateStaff');

});

Route::middleware('auth:staff')->group(function () {
    Route::get('/mda/staff/dashboard', [GetController::class, 'dashboardStaff'])
        ->name('staff.dashboard');

    Route::post('/mda/staff/logout', [App\Http\Controllers\Staff\StaffController::class, 'logout'])
        ->name('staff.logout');

    Route::put('/mda/staff/update-status-confirmed/{id}', [App\Http\Controllers\Staff\StaffController::class, 'updateStatusConfirmed'])
            ->name('staff.updateStatusConfirmed');

    Route::put('/mda/staff/update-status-cancelled/{id}', [App\Http\Controllers\Staff\StaffController::class, 'updateStatusCancelled'])
            ->name('staff.updateStatusCancelled');

    Route::put('/mda/staff/update-status-done/{id}', [App\Http\Controllers\Staff\StaffController::class, 'updateStatusDone'])
            ->name('staff.updateStatusDone');

    Route::delete('/mda/staff/delete-appointment/{id}', [App\Http\Controllers\Staff\StaffController::class, 'deleteAppointment'])
            ->name('staff.deleteAppointment');

     
    Route::post('/mda/staff/logout', [App\Http\Controllers\Staff\StaffController::class, 'logoutStaff'])
            ->name('logoutStaff');

});
