<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;

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


//********* views  *********//

//home
Route::get('/', function() {
    return view('home');
})->name('home');

//posts
Route::get('/posts', function() {
    return view('posts.index');
})->name('posts');


//********* Auth URLs *********//

// signup
Route::get('/signup', [SignupController::class, 'index'])->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('signup');

// login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

// logout
Route::get('/logout', [LogoutController::class, 'store'])->name('logout');


//********* Http URLs *********//

// dasboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 
// profile
Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');
Route::patch('/profile/{id}', [ProfileController::class, 'updateBio'])->name('profile');





## test ## To be deleted ##
Route::get('/country-list', [CountryController::class, 'index'])->name('country');
Route::post('/country-list', [CountryController::class, 'store'])->name('country');

Route::get('/language-list', [LanguageController::class, 'index'])->name('language');
Route::post('/language-list', [LanguageController::class, 'store'])->name('language');
