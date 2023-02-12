<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Classgrade\ClassgradeController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Teachers\TeacherController;
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

        });



