<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Admin\Department\DepartmentController;
use App\Http\Controllers\Admin\Designation\DesignationController;
use App\Http\Controllers\Admin\ClassMaster\ClassMasterController;
use App\Http\Controllers\Admin\Section\SectionController;
use App\Http\Controllers\Admin\Subject\SubjectController;
use App\Http\Controllers\Admin\AcademicSession\AcademicSessionController;
use App\Http\Controllers\Admin\Teacher\TeacherController;



/*
|--------------------------------------------------------------------------
| Frontend Website
|--------------------------------------------------------------------------
*/

Route::get('/', function () { return view('frontend.home'); })->name('home');
Route::get('/contact', function () { return view('frontend.contact'); })->name('contact');
Route::get('/courses', function () { return view('frontend.courses'); })->name('courses');
Route::get('/trainers', function () { return view('frontend.trainers'); })->name('trainers');
Route::get('/events', function () { return view('frontend.events'); })->name('events');
Route::get('/pricing', function () { return view('frontend.pricing'); })->name('pricing');
Route::get('/demo', function () { return view('frontend.demo'); })->name('demo');
Route::get('/course-details', function () { return view('frontend.course-details'); })->name('course-details');

Route::get('/about', [AboutController::class, 'index']) ->name('about');

/*
|--------------------------------------------------------------------------
| Admin Area
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('customers', CustomerController::class);

});


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});




/*
|--------------------------------------------------------------------------
| Testimonials
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function () {

        Route::resource('testimonials', TestimonialController::class)
            ->except(['show']);

        Route::post(
            'testimonials/{testimonial}/status',
            [TestimonialController::class, 'changeStatus']
        )->name('testimonials.status');
    });

/*
|--------------------------------------------------------------------------
| Departments
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::resource(
        'departments',
        DepartmentController::class
    );

    Route::post(
        'departments/{department}/status',
        [DepartmentController::class,'changeStatus']
    )->name('departments.status');

});


/*
|--------------------------------------------------------------------------
| Designation
|--------------------------------------------------------------------------
*/


Route::middleware(['auth'])->group(function () {

    Route::resource(
        'designations',
        DesignationController::class
    );

    Route::post(
        'designations/{designation}/status',
        [DesignationController::class, 'changeStatus']
    )->name('designations.status');

});
/*
|--------------------------------------------------------------------------
| Class
|--------------------------------------------------------------------------
*/


Route::middleware(['auth'])->group(function () {

    Route::resource(
        'classes',
        ClassMasterController::class
    );

    Route::post(
        'classes/{class}/status',
        [ClassMasterController::class,'changeStatus']
    )->name('classes.status');

});

/*
|--------------------------------------------------------------------------
| Section
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::resource(
        'sections',
        SectionController::class
    );

    Route::post(
        'sections/{section}/status',
        [SectionController::class,'changeStatus']
    )->name('sections.status');

});

/*
|--------------------------------------------------------------------------
| Subject
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::resource(
        'subjects',
        SubjectController::class
    );

    Route::post(
        'subjects/{subject}/status',
        [SubjectController::class,'changeStatus']
    )->name('subjects.status');

});


/*
|--------------------------------------------------------------------------
| Academic Session
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::resource(
        'academic-sessions',
        AcademicSessionController::class
    );

    Route::post(
        'academic-sessions/{academicSession}/status',
        [AcademicSessionController::class,'changeStatus']
    )->name('academic-sessions.status');

});


/*
|--------------------------------------------------------------------------
| Teachers
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::resource(
        'teachers',
        TeacherController::class
    );

    Route::post(
        'teachers/{teacher}/status',
        [TeacherController::class,'changeStatus']
    )->name('teachers.status');

    Route::get(
        'teachers/{teacher}/pdf',
        [TeacherController::class,'downloadPdf']
    )->name('teachers.pdf');

    Route::get(
        'teachers-export-excel',
        [TeacherController::class,'exportExcel']
    )->name('teachers.export.excel');

    Route::get(
        'teachers-export-pdf',
        [TeacherController::class,'exportPdf']
    )->name('teachers.export.pdf');

});

require __DIR__.'/auth.php';