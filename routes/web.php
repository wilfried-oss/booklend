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
Route::get('/show', [LoginController::class, 'show'])->name('login.show'); // Route that connects user, the login
Route::post('/login', [LoginController::class, 'login'])->name('login.perform'); // Route that connects user, the login
Route::post('/logout', [LogoutController::class, 'perform'])->name('logout.perform'); // Logout
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard'); // First page after user login

/**
 * All routes for Author model (CRUD)
 */
Route::middleware(['auth'])->prefix('author')->name('Author.')->group(function () {
    Route::get('index', [AuthorController::class, 'index'])->name('index'); // To see all authors
    Route::get('create', [AuthorController::class, 'create'])->name('create'); // Get form to CREATE new  author
    Route::post('store', [AuthorController::class, 'store'])->name('store'); // To save new author
    Route::get('show/{id}', [AuthorController::class, 'show'])->name('show'); // RED
    Route::get('edit/{id}', [AuthorController::class, 'edit'])->name('edit'); // Get the form to update
    Route::post('update/{id}', [AuthorController::class, 'update'])->name('update'); // UPDATE
    Route::post('delete/{id}', [AuthorController::class, 'delete'])->name('delete'); // DELETE
});


/**
 * All routes for Book CRUD
 */
Route::middleware(['auth'])->prefix('book')->name('Book.')->group(function () {
    Route::get('index', [BookController::class, 'index'])->name('index');
    Route::get('create', [BookController::class, 'create'])->name('create');
    Route::post('store', [BookController::class, 'store'])->name('store');
    Route::get('show/{id}', [BookController::class, 'show'])->name('show');
    Route::get('edit/{id}', [BookController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [BookController::class, 'update'])->name('update');
    Route::post('delete/{id}', [BookController::class, 'delete'])->name('delete');
});



/**
 *  All routes for student CRUD
 */

Route::middleware(['auth'])->prefix('student')->name('Student.')->group(function () {
    Route::get('index', [StudentController::class, 'index'])->name('index');
    Route::get('create', [StudentController::class, 'create'])->name('create');
    Route::post('store', [StudentController::class, 'store'])->name('store');
    Route::get('show/{id}', [StudentController::class, 'show'])->name('show');
    Route::get('edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [StudentController::class, 'update'])->name('update');
    Route::post('delete/{id}', [StudentController::class, 'delete'])->name('delete');
});


/**
 * All routes for lend CRUD
 */

Route::middleware(['auth'])->prefix('lend')->name('Lend.')->group(function () {
    Route::get('index', [LendController::class, 'index'])->name('index');
    Route::get('create', [LendController::class, 'create'])->name('create');
    Route::post('store', [LendController::class, 'store'])->name('store');
    Route::get('show/{id}', [LendController::class, 'show'])->name('show');
    Route::get('edit/{id}', [LendController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [LendController::class, 'update'])->name('update');
    Route::post('delete/{id}', [LendController::class, 'delete'])->name('delete');
});


/**
 * Lend back
 */

Route::middleware(['auth'])->prefix('lendback')->name('LendBack.')->group(function () {
    Route::get('create/{id}', [LendBackController::class, 'create'])->name('create');
    Route::post('delete/{id}', [LendBackController::class, 'delete'])->name('delete');
});
