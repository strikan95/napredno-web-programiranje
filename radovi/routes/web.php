<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectCollaboratorController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTaskController;
use App\Http\Controllers\UserController;
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

// --------------------------------- HOME ---------------------------------
Route::get('/', function () {
    return view('welcome');
});

// --------------------------------- DASHBOARD ---------------------------------
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

Route::get('/student/dashboard', function () { return view('student.dashboard'); })
    ->middleware(['auth', 'role:student', 'approved'])
    ->name('student.dashboard');

Route::get('/professor/dashboard', function () { return view('professor.dashboard'); })
    ->middleware(['auth', 'role:professor', 'approved'])
    ->name('professor.dashboard');

Route::get('/dashboard', function () { return view('dashboard'); })
    ->middleware(['auth'])
    ->name('dashboard');

Route::post('/admin/approve/user/{user:id}', [ApprovalController::class, 'approve'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.approve');

Route::post('/admin/approve/user/{user:id}/role/{role:id}', [ApprovalController::class, 'changeRole'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.user.role');

Route::get('/approval', function () { return 'not approved'; })->middleware(['auth'])->name('user.approval');

// --------------------------------- CHANGE PROFILE ROUTES ---------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
