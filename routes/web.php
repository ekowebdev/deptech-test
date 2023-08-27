<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth
Route::get('/', function (){
    return view('login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');;

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin')->middleware('auth');;
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create')->middleware('auth');;
    Route::post('/create', [AdminController::class, 'store'])->name('admin.store')->middleware('auth');;
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit')->middleware('auth');;
    Route::post('/edit/{id}', [AdminController::class, 'update'])->name('admin.update')->middleware('auth');;
    Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete')->middleware('auth');;
});

// Employee
Route::prefix('employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employee')->middleware('auth');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create')->middleware('auth');
    Route::post('/create', [EmployeeController::class, 'store'])->name('employee.store')->middleware('auth');
    Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit')->middleware('auth');
    Route::post('/edit/{id}', [EmployeeController::class, 'update'])->name('employee.update')->middleware('auth');
    Route::delete('/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete')->middleware('auth');
});

// Leave
Route::prefix('leave')->group(function () {
    Route::get('/', [LeaveController::class, 'index'])->name('leave')->middleware('auth');
    Route::get('/create', [LeaveController::class, 'create'])->name('leave.create')->middleware('auth');
    Route::post('/create', [LeaveController::class, 'store'])->name('leave.store')->middleware('auth');
    Route::get('/edit/{id}', [LeaveController::class, 'edit'])->name('leave.edit')->middleware('auth');
    Route::post('/edit/{id}', [LeaveController::class, 'update'])->name('leave.update')->middleware('auth');
    Route::delete('/delete/{id}', [LeaveController::class, 'destroy'])->name('leave.delete')->middleware('auth');
});
