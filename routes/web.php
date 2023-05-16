<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LendBackController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterController;

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

/**
 * We choice that the first page of our app will be the login form
 */
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', [RegisterController::class, 'show'])->name('register.show'); // To get register form
Route::post('/register', [RegisterController::class, 'register'])->name('register.perform'); // Save New User in Database
Route::post('/login', [LoginController::class, 'login'])->name('login.perform'); // Route that connects user, the login
Route::post('/logout', [LogoutController::class, 'perform'])->name('logout.perform'); // Logout
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard'); // First page after user login

Route::middleware(['auth'])->group(function () {
    Route::resource('author', AuthorController::class);
    Route::resource('book', BookController::class);
    Route::resource('student', StudentController::class);
    Route::resource('lend', LendController::class);
});



Route::middleware(['auth'])->prefix('lendback')->name('lendBack.')->group(function () {
    Route::get('create/{id}', [LendBackController::class, 'create'])->name('create');
    Route::post('delete/{id}', [LendBackController::class, 'delete'])->name('delete');
});
