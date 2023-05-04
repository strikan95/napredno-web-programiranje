<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Professor\ProfessorDashboardController;
use App\Http\Controllers\Professor\SubmissionApprovalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\StudentSubmissionController;
use App\Http\Controllers\TaskController;
use App\Util\Roles;
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

// --------------------------------- WELCOME PAGE ---------------------------------
Route::get('/', function () {
    return view('welcome');
})
    ->name('welcome');

// --------------------------------- DASHBOARD PAGES ---------------------------------
Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])
    ->middleware(['auth', 'role:'.Roles::ROLE_ADMIN])
    ->name('admin.dashboard');

Route::get('/student/dashboard', [StudentDashboardController::class, 'dashboard'])
    ->middleware(['auth', 'role:'.Roles::ROLE_STUDENT, 'approved'])
    ->name('student.dashboard');

Route::get('/professor/dashboard', [ProfessorDashboardController::class, 'dashboard'])
    ->middleware(['auth', 'role:'.Roles::ROLE_PROFESSOR, 'approved'])
    ->name('professor.dashboard');


// --------------------------------- ADMIN APPROVAL MANAGEMENT ROUTE ---------------------------------
Route::post('/admin/users/{user:id}/approve', [ApprovalController::class, 'approve'])
    ->middleware(['auth', 'role:'.Roles::ROLE_ADMIN])
    ->name('admin.users.approve');

// --------------------------------- ADMIN ROLE MANAGEMENT ROUTES ---------------------------------
Route::get('/admin/users/{user:id}/role', [RoleController::class, 'edit'])
    ->middleware(['auth', 'role:'.Roles::ROLE_ADMIN])
    ->name('admin.users.role.edit');

Route::post('/admin/users/{user:id}/role', [RoleController::class, 'set'])
    ->middleware(['auth', 'role:'.Roles::ROLE_ADMIN])
    ->name('admin.users.role.set');

// STUDENT
Route::get('/student/submissions', [StudentSubmissionController::class, 'index'])
    ->middleware(['auth', 'role:'.Roles::ROLE_STUDENT, 'approved'])
    ->name('student.submissions.index');


// --------------------------------- TASK ROUTES ---------------------------------
Route::get('/tasks/index/available', [TaskController::class, 'indexAvailable'])
    ->middleware(['auth'])
    ->name('task.index');

Route::get('/tasks/create', [TaskController::class, 'create'])
    ->middleware(['auth', 'role:'.Roles::ROLE_PROFESSOR])
    ->name('task.create');

Route::post('/tasks/store', [TaskController::class, 'store'])
    ->middleware(['auth', 'role:'.Roles::ROLE_PROFESSOR])
    ->name('task.store');

Route::get('/tasks/{task:id}', [TaskController::class, 'show'])
    ->middleware(['auth'])
    ->name('task.show');

// --------------------------------- TASK SUBMISSIONS ROUTES ---------------------------------
// INDEX SUBMISSIONS FOR A TASK
Route::get('/tasks/{task:id}/submissions', [SubmissionApprovalController::class, 'index'])
    ->middleware(['auth', 'role:'.Roles::ROLE_PROFESSOR])
    ->name('task.submissions.index');

// ACCEPT SUBMISSION
Route::post('/task/{task:id}/submissions/{submission:id}/accept', [SubmissionApprovalController::class, 'accept'])
    ->middleware(['auth', 'role:'.Roles::ROLE_PROFESSOR])
    ->name('task.submission.accept');

// APPLY TO TASK
Route::post('/tasks/apply/{task:id}', [StudentSubmissionController::class, 'applyToTask'])
    ->middleware(['auth', 'noTask','role:'.Roles::ROLE_STUDENT])
    ->name('task.apply');

// INDEX AVAILABLE TASKS
// UPDATE PRIORITY OF SUBMISSION
Route::post('/tasks/priority/set/{task:id}', [StudentSubmissionController::class, 'updateTaskPriority'])
    ->middleware(['auth', 'noTask', 'role:'.Roles::ROLE_STUDENT])
    ->name('task.priority');

// --------------------------------- IS USER APPROVED ROUTE ---------------------------------
Route::get('/approval', function () { return view('approval.approval'); })->middleware(['auth'])->name('user.approval');

// --------------------------------- LOCALE ---------------------------------
Route::post('locale/eng', [LocaleController::class, 'setEng'])->middleware(['auth'])->name('locale.eng');
Route::post('locale/cro', [LocaleController::class, 'setCro'])->middleware(['auth'])->name('locale.cro');

// --------------------------------- CHANGE PROFILE ROUTES ---------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
