<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\ServiceRecordController;

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// Employee Index 
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('employees',[EmployeeController::class, 'index'])
    ->name('employees');
    
// Employee Create
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('employees/create',[EmployeeController::class, 'create'])
    ->name('employees.create');

// Employee Store
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('employees/create',[EmployeeController::class, 'store'])
    ->name('employees.store');

//Employee Edit 
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('employees/edit/{employee}',[EmployeeController::class, 'edit'])
    ->name('employees.edit');

//Employee Update 
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->put('employees/edit/{employee}',[EmployeeController::class, 'update'])
    ->name('employees.update');

//Employee Delete
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->delete('employees/delete/{employee}',[EmployeeController::class, 'delete'])
    ->name('employees.delete');

//Service Index
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->get('services', [ServiceRecordController::class, 'index'])
    ->name('services');

//Service Create
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->get('services/create', [ServiceRecordController::class, 'create'])
    ->name('services.create');

//Service Store
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('services/create',[ServiceRecordController::class, 'store'])
    ->name('services.store');

//Service Edit 
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('services/edit/{service}',[ServiceRecordController::class, 'edit'])
    ->name('services.edit');

//Service Update 
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('services/edit/{service}',[ServiceRecordController::class, 'update'])
->name('services.update');

//Service Delete
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->delete('services/delete/{service}',[ServiceRecordController::class, 'delete'])
    ->name('services.delete');

// Department Index 
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('department',[DepartmentController::class, 'index'])
    ->name('department');


//Department Create
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->get('department/create', [DepartmentController::class, 'create'])
    ->name('department.create');

//Department Store
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('department/create',[DepartmentController::class, 'store'])
    ->name('department.store');


//Department Edit 
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('department/edit/{department}',[DepartmentController::class, 'edit'])
    ->name('department.edit');

//Service Update 
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('department/edit/{department}',[DepartmentController::class, 'update'])
->name('department.update');

//Service Delete
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->delete('department/delete/{department}',[DepartmentController::class, 'delete'])
    ->name('department.delete');