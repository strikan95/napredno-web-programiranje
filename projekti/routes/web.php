<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTaskController;
use Illuminate\Support\Facades\Route;

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

// --------------------------------- HOME PAGE ---------------------------------
Route::get('/', function () {
    return view('welcome');
});

// --------------------------------- DASHBOARD PAGE ---------------------------------
Route::get('dashboard', DashboardController::class)
    ->middleware(['auth'])
    ->name('dashboard');

// --------------------------------- SINGLE PROJECT PAGE ---------------------------------
Route::get('project/{project:id}', [ProjectController::class, 'show'])
    ->middleware(['auth'])
    ->name('project.show');

// --------------------------------- CREATE PROJECT PAGE ---------------------------------
Route::get('project/create', [ProjectController::class, 'create'])
    ->middleware(['auth'])
    ->name('project.create');

// STORE
Route::post('/project', [ProjectController::class, 'store'])
    ->middleware(['auth'])
    ->name('project.store');

// ADD TASK
Route::post('/project/{project:id}/task', [ProjectTaskController::class, 'store'])
    ->middleware(['auth']);

// EDIT TASK
Route::put('/project/{project:id}/task/{task:id}', [ProjectTaskController::class, 'update'])
    ->middleware(['auth']);

// DELETE TASK
Route::delete('/project/{project:id}/task/{task:id}', [ProjectTaskController::class, 'delete'])
    ->middleware(['auth']);


// --------------------------------- CHANGE PROFILE ROUTES ---------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
