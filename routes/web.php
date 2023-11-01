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
Route::get('/notice',[BackEndController::class, 'notice'])->name('backend.notice');

Route::post('/add-notice',[BackEndController::class, 'add_notice'])->name('backend.add_notice');

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

