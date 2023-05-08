<?php

use Illuminate\Support\Facades\Auth;
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

Route::post('group_create', [App\Http\Controllers\MainController::class, 'group_create'] )->name('group_create');

Route::delete('destroy_user/{id}', [App\Http\Controllers\MainController::class, 'destroy_user'] )->name('destroy_user');

Route::get('user/edit/{id}', [App\Http\Controllers\MainController::class, 'user_edit'])->name('user_edit');

Route::put('user/{user}', [App\Http\Controllers\MainController::class, 'user_update'])->name('user_update');
Route::patch('user/{user}', [App\Http\Controllers\MainController::class, 'user_update'])->name('user_update');

Route::resource('discipline', App\Http\Controllers\DisciplineController::class);

Route::resource('subject_teach', App\Http\Controllers\SubjectTeachController::class);

Route::post('discipline_group', [App\Http\Controllers\DisciplineController::class, 'discipline_group'])->name('discipline_group');

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Route::resource('group', App\Http\Controllers\GroupController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
