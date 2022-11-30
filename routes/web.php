<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserUpdateAvatarController;
use App\Http\Controllers\User\UserUpdateBioController;
use App\Http\Controllers\User\UserUpdateLanguageController;
use App\Http\Controllers\User\UserUpdateCountryController;
use App\Http\Controllers\User\UserUpdateNameController;
use App\Http\Controllers\User\UserUpdateProfileController;
use App\Http\Controllers\User\UserDeleteLanguageController;
use App\Http\Controllers\User\UserDeleteAccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Models\User;

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
    $users = User::all();
    return view('home', compact('users'));
})->name('home');



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
// user
Route::get('profile/user/{id}', [UserController::class, 'show'])->name('userProfile');
Route::get('profile/user/update-profile/{id}', [UserUpdateProfileController::class, 'updateProfile'])->name('updateProfile');
Route::patch('profile/user/update-bio/{id}', [UserUpdateBioController::class, 'updateBio'])->name('updateBio');
Route::patch('profile/user/update-avatar/{id}', [UserUpdateAvatarController::class, 'updateAvatar'])->name('updateAvatar');
Route::patch('profile/user/update-language/{id}', [UserUpdateLanguageController::class, 'updateLanguage'])->name('updateLanguage');
Route::patch('profile/user/update-country/{id}', [UserUpdateCountryController::class, 'updateCountry'])->name('updateCountry');
Route::patch('profile/user/update-name/{id}', [UserUpdateNameController::class, 'updateName'])->name('updateName');
Route::delete('profile/user/delete-language/{id}', [UserDeleteLanguageController::class, 'deleteLanguage'])->name('deleteLanguage');
Route::get('profile/user/delete-account/{id}', [UserDeleteAccountController::class, 'deleteAccount'])->name('deleteAccount');

// admin
Route::get('/admin', [AdminController::class, 'show'])->name('adminPanel');
Route::get('/admin/delete-user-account/{user}', [AdminController::class, 'adminDeleteUser'])->name('adminDeleteUser');


