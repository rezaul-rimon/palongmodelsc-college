<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontEndController;
use App\Http\Controllers\backend\{BackEndController, AuthController, CommitteeController, EventController, GalleryController, NoticeController, StipendStudentsController, StudentsController, TeacherController};

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


//Route::get('/',[FrontEndController::class, 'index'])->name('frontend.index');
Route::controller(FrontEndController::class)->group(function(){
    Route::get('/', 'index')->name('frontend.index');
    Route::get('teachers-page', 'teachers_page')->name('frontend.teachers');
});

Route::get('/admin',[BackEndController::class, 'index'])->middleware('auth')->name('backend.index');

//Login and Registration 
Route::controller(AuthController::class)->group(function() {
    Route::get('/registration', 'registration')->name('registration');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

//Notice
Route::controller(NoticeController::class)->prefix('backend')->middleware('auth')->group(function(){
    Route::get('/notice', 'notice')->name('backend.notice');
    Route::get('/add-notice', 'add_notice')->name('backend.add_notice');
    Route::post('/store-notice', 'store_notice')->name('backend.store_notice');
    Route::get('/edit-notice/{id}', 'edit_notice')->name('backend.edit_notice');
    Route::post('/update-notice/{id}', 'update_notice')->name('backend.update_notice');
    Route::get('/delete-notice/{id}', 'delete_notice')->name('backend.delete_notice');
});

//Teacher
Route::controller(TeacherController::class)->prefix('backend')->middleware('auth')->group(function () {
    Route::get('/teacher', 'teacher')->name('backend.teacher');
    Route::get('/add-teacher', 'add_teacher')->name('backend.add_teacher');
    Route::post('/store-teacher', 'store_teacher')->name('backend.store_teacher');
    Route::get('/edit-teacher/{id}', 'edit_teacher')->name('backend.edit_teacher');
    Route::post('/update-teacher/{id}', 'update_teacher')->name('backend.update_teacher');
    Route::get('/delete-teacher/{id}', 'delete_teacher')->name('backend.delete_teacher');
});

//Committee
Route::controller(CommitteeController::class)->prefix('backend')->middleware('auth')->group(function () {
    Route::get('/committee', 'committee')->name('backend.committee');
    Route::get('/add-committee', 'add_committee')->name('backend.add_committee');
    Route::post('/store-committee', 'store_committee')->name('backend.store_committee');
    Route::get('/edit-committee/{id}', 'edit_committee')->name('backend.edit_committee');
    Route::post('/update-committee/{id}', 'update_committee')->name('backend.update_committee');
    Route::get('/delete-committee/{id}', 'delete_committee')->name('backend.delete_committee');
});

//Event
Route::controller(EventController::class)->prefix('backend')->middleware('auth')->group(function () {
    Route::get('/event', 'event')->name('backend.event');
    Route::get('/add-event', 'add_event')->name('backend.add_event');
    Route::post('/store-event', 'store_event')->name('backend.store_event');
    Route::get('/edit-event/{id}', 'edit_event')->name('backend.edit_event');
    Route::post('/update-event/{id}', 'update_event')->name('backend.update_event');
    Route::get('/delete-event/{id}', 'delete_event')->name('backend.delete_event');
});

//Gallery
Route::controller(GalleryController::class)->prefix('backend')->middleware('auth')->group(function () {
    Route::get('/gallery', 'gallery')->name('backend.gallery');
    Route::get('/add-gallery', 'add_gallery')->name('backend.add_gallery');
    Route::post('/store-gallery', 'store_gallery')->name('backend.store_gallery');
    Route::get('/edit-gallery/{id}', 'edit_gallery')->name('backend.edit_gallery');
    Route::post('/update-gallery/{id}', 'update_gallery')->name('backend.update_gallery');
    Route::get('/delete-gallery/{id}', 'delete_gallery')->name('backend.delete_gallery');
});

//Students
Route::controller(StudentsController::class)->prefix('backend')->middleware('auth')->group(function () {
    Route::get('/students', 'students')->name('backend.students');
    Route::get('/add-students', 'add_students')->name('backend.add_students');
    Route::post('/store-students', 'store_students')->name('backend.store_students');
    Route::get('/delete-students/{id}', 'delete_students')->name('backend.delete_students');
    Route::get('/edit-students/{id}', 'edit_students')->name('backend.edit_students');
    Route::post('/update-students/{id}', 'update_students')->name('backend.update_students');
});

//Students
Route::controller(StipendStudentsController::class)->prefix('backend')->middleware('auth')->group(function () {
    Route::get('/stipend-students', 'stipend_students')->name('backend.stipend_students');
    Route::get('/add-stipend-students', 'add_stipend_students')->name('backend.add_stipend_students');
    Route::post('/store-stipend-students', 'store_stipend_students')->name('backend.store_stipend_students');
    Route::get('/delete-stipend-students/{id}', 'delete_stipend_students')->name('backend.delete_stipend_students');
    Route::get('/edit-stipend-students/{id}', 'edit_stipend_students')->name('backend.edit_stipend_students');
    Route::post('/update-stipend-students/{id}', 'update_stipend_students')->name('backend.update_stipend_students');
});


