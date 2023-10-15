<?php

use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Teachers\TeacherController;
use Illuminate\Support\Facades\Route;

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
//

Route::group(['middleware' => ['guest']],function (){

    Route::get('/', function()
    {
        return view('auth.login');});
});


require __DIR__.'/auth.php';


//==============================Translate all pages============================


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    //==============================dashboard============================

    Route::get('dashboard', function()
    {
        return view('dashboard');});;

    //==============================dashboard============================


    Route::resource('Grades','App\Http\Controllers\Grades\GradeController');


    //==============================Classrooms============================

    Route::resource('Classrooms', 'App\Http\Controllers\Classrooms\ClassroomController');
    Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');

    Route::post('Filter_Classes',[ClassroomController::class,'Filter_Classes'])->name('Filter_Classes');

//==============================Sections============================

    Route::resource('Sections', 'App\Http\Controllers\Sections\SectionController');

    Route::get('/classes/{id}', [App\Http\Controllers\Sections\SectionController::class,'getclasses'])->name('getclasses');


    //==============================Teachers============================


    Route::resource('Teachers', TeacherController::class);

//==============================Students============================


//    Route::resource('Students',StudentController::class);

    Route::resource('Students', 'StudentController');
        Route::get('/Get_Sections/{id}', [App\Http\Controllers\Students\StudentController::class,'Get_Sections'])->name('Get_Sections');
    Route::get('/Get_classrooms/{id}', [App\Http\Controllers\Students\StudentController::class,'Get_classrooms'])->name('Get_classrooms');




//==============================Parent============================


    Route::view('add_parent','livewire.show_form');


});








//==============================parents============================

Route::view('add_parent','livewire.show_Form');
//==============================Students============================
