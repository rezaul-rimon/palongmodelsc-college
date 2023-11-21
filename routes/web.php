<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontEndController;
use App\Http\Controllers\backend\{BackEndController, AuthController, CommitteeController, ContactUsController, EventController, GalleryController, NoticeController, StipendStudentsController, StudentsController, TeacherController, UserController};
use App\Http\Controllers\frontend\AdmissionController;
use App\Http\Controllers\backend\QuickLinkController;

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
    Route::get('/teachers-page', 'teachers_page')->name('frontend.teachers');
    Route::get('/notice-events-page', 'notice_events_page')->name('frontend.notice_events');
    Route::get('/students-page', 'students_page')->name('frontend.students_page');
    Route::get('/about-us', 'about_us')->name('frontend.about_us');
    Route::get('/gallery-page', 'gallery_page')->name('frontend.gallery_page');
    Route::get('/contact-us', 'contact_us')->name('frontend.contact_us');
    Route::post('/contact-store', 'contact_store')->name('contact_store');

    Route::get('/impoertant-links', 'important_links')->name('frontend.important_links');
    
});

// Route::controller(AdmissionController::class)->group(function(){
//     Route::get('/admission', 'admission')->name('frontend.admission');
//     Route::post('/admission-store', 'admission_store')->name('frontend.admission_store');
// });

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

// Notice
Route::controller(NoticeController::class)->prefix('backend')->middleware('auth', 'permission')->group(function () {
    Route::get('/notice', 'notice')->name('backend.notice');

    Route::middleware('role:1,2')->group(function () {
        
        Route::get('/add-notice', 'add_notice')->name('backend.add_notice');
        Route::post('/store-notice', 'store_notice')->name('backend.store_notice');
        Route::get('/edit-notice/{id}', 'edit_notice')->name('backend.edit_notice');
        Route::post('/update-notice/{id}', 'update_notice')->name('backend.update_notice');
        Route::get('/delete-notice/{id}', 'delete_notice')->name('backend.delete_notice');
    });
});

//Teacher
Route::controller(TeacherController::class)->prefix('backend')->middleware('auth', 'permission')->group(function () {
    Route::get('/teacher', 'teacher')->name('backend.teacher');

    Route::middleware('role:1,2')->group(function () {
        Route::get('/add-teacher', 'add_teacher')->name('backend.add_teacher');
        Route::post('/store-teacher', 'store_teacher')->name('backend.store_teacher');
        Route::get('/edit-teacher/{id}', 'edit_teacher')->name('backend.edit_teacher');
        Route::post('/update-teacher/{id}', 'update_teacher')->name('backend.update_teacher');
        Route::get('/delete-teacher/{id}', 'delete_teacher')->name('backend.delete_teacher');
    });
});

// Committee
Route::controller(CommitteeController::class)->prefix('backend')->middleware('auth', 'permission')->group(function () {
    Route::get('/committee', 'committee')->name('backend.committee');

    Route::middleware('role:1,2')->group(function () {
        Route::get('/add-committee', 'add_committee')->name('backend.add_committee');
        Route::post('/store-committee', 'store_committee')->name('backend.store_committee');
        Route::get('/edit-committee/{id}', 'edit_committee')->name('backend.edit_committee');
        Route::post('/update-committee/{id}', 'update_committee')->name('backend.update_committee');
        Route::get('/delete-committee/{id}', 'delete_committee')->name('backend.delete_committee');
    });
});

// Event
Route::controller(EventController::class)->prefix('backend')->middleware('auth', 'permission')->group(function () {
    Route::get('/event', 'event')->name('backend.event');

    Route::middleware('role:1,2')->group(function () {
        Route::get('/add-event', 'add_event')->name('backend.add_event');
        Route::post('/store-event', 'store_event')->name('backend.store_event');
        Route::get('/edit-event/{id}', 'edit_event')->name('backend.edit_event');
        Route::post('/update-event/{id}', 'update_event')->name('backend.update_event');
        Route::get('/delete-event/{id}', 'delete_event')->name('backend.delete_event');
    });
});

// QuickLink
Route::controller(QuickLinkController::class)->prefix('backend')->middleware('auth', 'permission')->group(function () {
    Route::get('/quick-link', 'quick_link')->name('backend.quick_link');

    Route::middleware('role:1,2')->group(function () {
        Route::get('/add-quick-link', 'add_quick_link')->name('backend.add_quick_link');
        Route::post('/store-quick-link', 'store_quick_link')->name('backend.store_quick_link');
        Route::get('/edit-quick-link/{id}', 'edit_quick_link')->name('backend.edit_quick_link');
        Route::post('/update-quick-link/{id}', 'update_quick_link')->name('backend.update_quick_link');
        Route::get('/delete-quick-link/{id}', 'delete_quick_link')->name('backend.delete_quick_link');
    });
});

// Gallery
Route::controller(GalleryController::class)->prefix('backend')->middleware('auth', 'permission')->group(function () {
    Route::get('/gallery', 'gallery')->name('backend.gallery');

    Route::middleware('role:1,2')->group(function () {
        Route::get('/add-gallery', 'add_gallery')->name('backend.add_gallery');
        Route::post('/store-gallery', 'store_gallery')->name('backend.store_gallery');
        Route::get('/edit-gallery/{id}', 'edit_gallery')->name('backend.edit_gallery');
        Route::post('/update-gallery/{id}', 'update_gallery')->name('backend.update_gallery');
        Route::get('/delete-gallery/{id}', 'delete_gallery')->name('backend.delete_gallery');
    });
});

// Students
Route::controller(StudentsController::class)->prefix('backend')->middleware('auth', 'permission')->group(function () {
    Route::get('/students', 'students')->name('backend.students');

    Route::middleware('role:1,2')->group(function () {
        Route::get('/add-students', 'add_students')->name('backend.add_students');
        Route::post('/store-students', 'store_students')->name('backend.store_students');
        Route::get('/delete-students/{id}', 'delete_students')->name('backend.delete_students');
        Route::get('/edit-students/{id}', 'edit_students')->name('backend.edit_students');
        Route::post('/update-students/{id}', 'update_students')->name('backend.update_students');
    });
});

// Stipend Students
Route::controller(StipendStudentsController::class)->prefix('backend')->middleware('auth', 'permission')->group(function () {
    Route::get('/stipend-students', 'stipend_students')->name('backend.stipend_students');

    Route::middleware('role:1,2')->group(function () {
        Route::get('/add-stipend-students', 'add_stipend_students')->name('backend.add_stipend_students');
        Route::post('/store-stipend-students', 'store_stipend_students')->name('backend.store_stipend_students');
        Route::get('/delete-stipend-students/{id}', 'delete_stipend_students')->name('backend.delete_stipend_students');
        Route::get('/edit-stipend-students/{id}', 'edit_stipend_students')->name('backend.edit_stipend_students');
        Route::post('/update-stipend-students/{id}', 'update_stipend_students')->name('backend.update_stipend_students');
    });
});

// Contact Us
Route::controller(ContactUsController::class)->prefix('backend')->middleware('auth', 'permission')->group(function () {
    Route::get('/contact-us', 'contact_us')->name('backend.contact_us');

    Route::middleware('role:1,2')->group(function () {
        Route::get('/delete-contact-us/{id}', 'delete_contact_us')->name('backend.delete_contact_us');
    });
});

//User
Route::controller(UserController::class)->prefix('backend')->middleware('auth', 'permission', 'role:2')->group(function () {
    Route::get('/users', 'users')->name('backend.users');
    Route::get('/edit-user/{id}', 'edit_user')->name('backend.edit_user');
    Route::post('/update-user/{id}', 'update_user')->name('backend.update_user');
    Route::get('/delete-user/{id}', 'delete_user')->name('backend.delete_user');
});


