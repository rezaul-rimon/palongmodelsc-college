<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontEndController;
use App\Http\Controllers\backend\{BackEndController, AuthController, CommitteeController, EventController, NoticeController, StudentsController, TeacherController};

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
Route::controller(NoticeController::class)->prefix('backend')->group(function(){
    Route::get('/notice', 'notice')->name('backend.notice');
    Route::get('/add-notice', 'add_notice')->name('backend.add_notice');
    Route::post('/store-notice', 'store_notice')->name('backend.store_notice');
    Route::get('/edit-notice/{id}', 'edit_notice')->name('backend.edit_notice');
    Route::post('/update-notice/{id}', 'update_notice')->name('backend.update_notice');
    Route::get('/delete-notice/{id}', 'delete_notice')->name('backend.delete_notice');
});


//Teacher
Route::controller(TeacherController::class)->prefix('backend')->group(function () {
    Route::get('/teacher', 'teacher')->name('backend.teacher');
    Route::get('/add-teacher', 'add_teacher')->name('backend.add_teacher');
    Route::post('/store-teacher', 'store_teacher')->name('backend.store_teacher');
    Route::get('/edit-teacher/{id}', 'edit_teacher')->name('backend.edit_teacher');
    Route::post('/update-teacher/{id}', 'update_teacher')->name('backend.update_teacher');
    Route::get('/delete-teacher/{id}', 'delete_teacher')->name('backend.delete_teacher');
});


//Committee
Route::controller(CommitteeController::class)->prefix('backend')->group(function () {
    Route::get('/committee', 'committee')->name('backend.committee');
    Route::get('/add-committee', 'add_committee')->name('backend.add_committee');
    Route::post('/store-committee', 'store_committee')->name('backend.store_committee');
    Route::get('/edit-committee/{id}', 'edit_committee')->name('backend.edit_committee');
    Route::post('/update-committee/{id}', 'update_committee')->name('backend.update_committee');
    Route::get('/delete-committee/{id}', 'delete_committee')->name('backend.delete_committee');
});


//Event
Route::controller(EventController::class)->prefix('backend')->group(function () {
    Route::get('/event', 'event')->name('backend.event');
    Route::get('/add-event', 'add_event')->name('backend.add_event');
    Route::post('/store-event', 'store_event')->name('backend.store_event');
    Route::get('/edit-event/{id}', 'edit_event')->name('backend.edit_event');
    Route::post('/update-event/{id}', 'update_event')->name('backend.update_event');
    Route::get('/delete-event/{id}', 'delete_event')->name('backend.delete_event');
});


//Gallery
Route::get('/gallery', [BackEndController::class, 'gallery'])->name('backend.gallery');
Route::post('/add-gallery',[BackEndController::class, 'add_gallery'])->name('backend.add_gallery');
Route::get('/delete-gallery/{id}', [BackEndController::class, 'delete_gallery'])->name('backend.delete_gallery');

//Students

Route::controller(StudentsController::class)->prefix('backend')->group(function () {
    Route::get('/students', 'students')->name('backend.students');
    Route::get('/add-students', 'add_students')->name('backend.add_students');
    Route::post('/store-students', 'store_students')->name('backend.store_students');
    Route::get('/delete-students/{id}', 'delete_students')->name('backend.delete_students');
    Route::get('/edit-students/{id}', 'edit_students')->name('backend.edit_students');
    Route::post('/update-students/{id}', 'update_students')->name('backend.update_students');
});


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

