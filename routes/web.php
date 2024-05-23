<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController ;
use App\Http\Controllers\DashboardController ;
use App\Http\Controllers\EmployeesController ;
use App\Http\Controllers\CreateEmployeesController ;




Route::get('/', function () {
	return view('welcome');
});


Route::get('/auth', [AuthenticationController::class, 'index'])->name('index');
Route::get('/authentication', [AuthenticationController::class, 'index'])->name('index');
Route::post('/authentication', [AuthenticationController::class, 'login'])->name('authentication.login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/empleados', [EmployeesController::class, 'index2'])->name('eployees');
Route::get('/empleados', [EmployeesController::class, 'index'])->name('employees.index');

Route::put('/empleados/{id}', [EmployeesController::class, 'update']);
Route::delete('/empleados/{id}', [EmployeesController::class, 'destroy']);

//Route::post('/empleados', [EmployeesController::class, 'store']);

Route::post('/empleados', [EmployeesController::class, 'store'])->name('empleados.store');

Route::get('/createemployees', [CreateEmployeesController::class, 'index'])->name('createemployees');
Route::post('/storeEmployee', [CreateEmployeesController::class, 'storeEmployee'])->name('storeEmployee');

//Route::delete('/empleados/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');

Route::delete('/empleados/{id}', function ($id) {
    dd("Solicitud DELETE para eliminar el empleado con ID: $id");
})->name('employees.destroy');





 