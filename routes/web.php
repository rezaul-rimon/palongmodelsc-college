<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontEndController;
use App\Http\Controllers\backend\{BackEndController, AuthController};

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontEndController::class, 'index'])->name('frontend.index');
Route::get('/admin',[BackEndController::class, 'index'])->name('backend.index');

//Notice
Route::get('/notice',[BackEndController::class, 'notice'])->name('backend.notice');
Route::post('/add-notice',[BackEndController::class, 'add_notice'])->name('backend.add_notice');
Route::get('/delete-notice/{id}', [BackEndController::class, 'delete_notice'])->name('backend.delete_notice');

//Teacher
Route::get('/teacher', [BackEndController::class, 'teacher'])->name('backend.teacher');
Route::post('/add-teacher',[BackEndController::class, 'add_teacher'])->name('backend.add_teacher');
Route::get('/delete-teacher/{id}', [BackEndController::class, 'delete_teacher'])->name('backend.delete_teacher');

//Committee
Route::get('/committee', [BackEndController::class, 'committee'])->name('backend.committee');
Route::post('/add-committee',[BackEndController::class, 'add_committee'])->name('backend.add_committee');
Route::get('/delete-committee/{id}', [BackEndController::class, 'delete_committee'])->name('backend.delete_committee');

// Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::get('/registration', [AuthController::class, 'registration'])->name('registration');

Route::controller(AuthController::class)->group(function() {
    Route::get('/registration', 'registration')->name('registration');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

