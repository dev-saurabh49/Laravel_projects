<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees',[EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create',[EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees',[EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}/edit',[EmployeeController::class, 'edit'])->name('employees.edit');
Route::post('/employees/update/{id}', [EmployeeController::class, 'update'])->name('employees.update');

Route::get('/employees/{id}/delete', [EmployeeController::class, 'destroy'])->name('employees.destroy');
