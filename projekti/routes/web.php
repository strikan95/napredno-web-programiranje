<?php

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
Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth'])
    ->name('dashboard');

// --------------------------------- PROJECT CRUD ROUTES ---------------------------------
Route::resource('project', ProjectController::class)
    ->middleware(['auth']);

// --------------------------------- PROJECT-TASKS CRUD ROUTES ---------------------------------
Route::resource('project.task', ProjectTaskController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware(['auth']);

Route::resource('project.collaborator', ProjectCollaboratorController::class)
    ->only(['store', 'destroy'])
    ->middleware(['auth']);

Route::resource('user', UserController::class)
    ->only(['index', 'show'])
    ->middleware(['auth']);

Route::get('/candidates/project/{project}', [UserController::class, 'index'])
    ->middleware(['auth'])
    ->name('project.candidates.index');

// --------------------------------- PROJECT COLLABORATORS ---------------------------------
// ADD COLLABORATOR
/*Route::post('/project/{project:id}/collaborator', [ProjectCollaboratorController::class, 'add'])
    ->middleware(['auth']);*/

// REMOVE COLLABORATOR
/*Route::delete('/project/{project:id}/collaborator/{collaboratorId}', [ProjectCollaboratorController::class, 'remove'])
    ->middleware(['auth']);*/


// --------------------------------- CHANGE PROFILE ROUTES ---------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
