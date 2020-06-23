<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect(route('courses.index'));
    // return view('welcome');
});

Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->middleware('verified');


Route::resource('courses', 'CourseController')
->middleware('auth');
Route::get('/courses/{course}/subscribe', 'CourseController@subscribe')
    ->name('courses.subscribe')
    ->middleware('auth');


Route::resource('lessons', 'LessonController')
->middleware('auth');;
Route::post('/lessons/{lesson}/save-answer', 'LessonController@saveAnswer')
    ->name('lessons.save-answer')
    ->middleware('auth');

Route::get('/lessons/{course}/load-select-option-for-course', 'LessonController@lhsofCourse')
->name('lessons.lhsofCourse');

Route::resource('questions', 'QuestionController')
    ->middleware('auth');

Route::resource('courseSubscribes', 'CourseSubscribeController')
    ->middleware('auth');



Route::resource('answers', 'AnswerController')
    ->middleware('auth');