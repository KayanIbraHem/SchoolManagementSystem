<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grades\GradeController;
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
    Route::get('/', function()
    {
    return view('auth.login');
    });
});

Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
    ], function(){

        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('grades',GradeController::class);


    });



