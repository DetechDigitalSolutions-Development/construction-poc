<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ReportController;

Route::middleware(['auth'])->group(function () {
    Route::resource('staff', StaffController::class);
    Route::resource('attendance', AttendanceController::class);
    Route::get('attendance/report', [AttendanceController::class, 'generateReport'])->name('attendance.report');
});

// Default route for the welcome page or homepage
Route::get('/', function () {
    return view('welcome');
});


Route::get('attendance/report', [ReportController::class, 'generateAttendanceReport'])->name('attendance.report');
Route::get('attendance/export', [ReportController::class, 'exportAttendanceReport'])->name('export.attendance');
