<?php

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

Route::get('/user', [App\Http\Controllers\MainController::class, 'user'] )->name('stud');

//Route::get('/discipline', [App\Http\Controllers\MainController::class, 'discipline'] )->name('discipline');

Route::get('/group', [App\Http\Controllers\MainController::class, 'group'] );

//Route::post('/discipline', [App\Http\Controllers\MainController::class, 'user_create'] );

Route::post('/user', [App\Http\Controllers\MainController::class, 'user_create'] )->name('user');

Route::post('', [App\Http\Controllers\MainController::class, 'group_create'] )->name('group_create');

Route::resource('discipline', App\Http\Controllers\DisciplineController::class);

Route::resource('subject_teach', App\Http\Controllers\SubjectTeachController::class);



// Route::get('/about', function() {
//     return view ('about');
// });

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
