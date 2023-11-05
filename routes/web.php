<?php

use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\TecherStaffInfoController;
use App\Http\Controllers\StudentsInfoController;
use App\Http\Controllers\ReceptionController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
require __DIR__ . '/auth.php';
Route::middleware(['auth', 'verified'])->group(function () {

// class route
Route::get('class', [ClassController::class, 'index'])->name('class');
Route::post('class/create', [ClassController::class, 'store']);
Route::post('class/update', [ClassController::class, 'update']);
Route::get('class/delete/{id}', [ClassController::class, 'delete']);

// section route
Route::get('section', [SectionController::class, 'index'])->name('section');
Route::post('section/create', [SectionController::class, 'store']);
Route::post('section/update', [SectionController::class, 'update']);
Route::get('section/delete/{id}', [SectionController::class, 'delete']);

//subject route
Route::get('subject', [SubjectController::class, 'index'])->name('class.subject');
Route::get('/class/{id}/subject', [SubjectController::class, 'subjectClass'])->name('subject.class');
Route::get('/subject/add', [SubjectController::class, 'addSubject'])->name('subject.add');
Route::post('/subject/save', [SubjectController::class, 'saveSubject'])->name('subject.store');
Route::get('/subject/edit/{id}', [SubjectController::class, 'editSubject'])->name('subject.edit');
Route::post('/subject/update', [SubjectController::class, 'updateSubject'])->name('subject.update');
// Route::get('subject/delete/{id}', [SubjectController::class, 'delete']);

// Teacher and staff route

Route::get('teacher', [TecherStaffInfoController::class, 'index'])->name('teacher.list');
Route::get('staff', [TecherStaffInfoController::class, 'indexStaff'])->name('staff.list');
    Route::get('/info/create', [TecherStaffInfoController::class, 'create'])->name('info.create');
    Route::post('/info/save', [TecherStaffInfoController::class, 'store'])->name('info.store');
    Route::get('/info/edit/{id}', [TecherStaffInfoController::class, 'edit'])->name('info.edit');
    Route::post('/info/update', [TecherStaffInfoController::class, 'update'])->name('info.update');
    Route::get('info/delete/{id}', [TecherStaffInfoController::class, 'delete']);

    //reception route
    Route::get('reception', [ReceptionController::class, 'index'])->name('reception');
    Route::get('/reception/create', [ReceptionController::class, 'create'])->name('reception.create');
    Route::post('/reception/save', [ReceptionController::class, 'store'])->name('reception.store');
    Route::get('/reception/edit/{id}', [ReceptionController::class, 'edit'])->name('reception.edit');
    Route::post('/reception/update', [ReceptionController::class, 'update'])->name('reception.update');
    Route::get('reception/delete/{id}', [ReceptionController::class, 'delete']);

// admin list
Route::get('admin/list', [SuperAdminController::class, 'adminList'])->name('admin.list');
    Route::get('admin/create', [SuperAdminController::class, 'adminCreate'])->name('admin.create');
    Route::post('save/admin', [SuperAdminController::class, 'saveAdmin'])->name('admin.save');
    Route::get('admin/edit/{id}', [SuperAdminController::class, 'adminEdit']);
    // Route::get('user/list', [SuperAdminController::class, 'userList'])->name('user.list');

});
