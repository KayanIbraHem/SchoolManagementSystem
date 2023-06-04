<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fees\FeesController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Http\Controllers\Classgrade\ClassgradeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Students\Graduated\GraduatedController;
use App\Http\Controllers\Students\Promotions\PromotionController;
use App\Http\Controllers\Students\FeeInvoices\FeeInvoicesController;

Auth::routes();

Route::middleware(['guest'])->group(function () {
        Route::get('/', function(){
            return view('auth.login');
        });
    });

Route::group([
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
            ], function(){

            Route::get('/dashboard', [App\Http\Controllers\HomeController::class    , 'index'])->name('home');

            Route::resource('grades',GradeController::class);
            //Classes
            Route::resource('classes',ClassgradeController::class);
            Route::post('delete/all',[ClassgradeController::class,'deleteCheckedBox'])->name('delete.all');
            Route::get('class/filter',[ClassgradeController::class,'classFilter'])->name('class.filter');
            //End Classes

            //Sections
            Route::resource('sections',SectionController::class);
            Route::get('getclass/{grade}',[SectionController::class,'getClass']);
            //End Sections

            //Parents Livewire
            Route::view('newparent','livewire.show')->name('parent.add');
            //End Parents Livewire

            //Teachers
            Route::resource('teachers',TeacherController::class);
            //End Teachers

            //Students
            Route::resource('students',StudentController::class);
            Route::get('get_class/{id}',[StudentController::class,'getClass']);
            Route::get('get_section/{id}',[StudentController::class,'getSection']);
            Route::post('upload_attachment/{student_name}/{student_id}',[StudentController::class,'uploadAttachment'])->name('upload_attachment');
            Route::get('download_attachment/{student_name}/{file_name}',[StudentController::class,'downloadAttachment'])->name('download_attachment');
            Route::post('delete_attachment',[StudentController::class,'deleteAttachment'])->name('delete_attachment');
            //Promnotions
            Route::resource('promotions',PromotionController::class);
            //End Promnotions
            //End Students

             //Graduated
             Route::resource('graduated',GraduatedController::class);
             //End Graduated

             //Fees
             Route::resource('fees',FeesController::class);
             //End Fees

             //FeeInvoices
             Route::resource('feeinvoices',FeeInvoicesController::class);
             //End FeeInvoices//
        });



