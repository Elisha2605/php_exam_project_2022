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
use App\Http\Controllers\Connection\ConnectionController;
use App\Http\Controllers\Home\HomeController;


//********* views  *********//

//index
// Route::get('/', function() {
//     $users = User::all();
//     return view('home', compact('users'));
// })->name('index');

//home
Route::get('/home/users', [HomeController::class, 'show'])->name('home.show');


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
Route::get('/user/{user:name}/profile', [UserController::class, 'show'])->name('profile.show');
Route::get('/user/{user:name}/profile/update', [UserUpdateProfileController::class, 'updateProfile'])->name('profile.update.view');

// profile
Route::patch('/profile/{user}/update/bio', [UserUpdateBioController::class, 'updateBio'])->name('profile.update.bio');
Route::patch('/profile/{user}/update/avatar', [UserUpdateAvatarController::class, 'updateAvatar'])->name('profile.update.avatar');
Route::patch('/profile/{user}/update/language', [UserUpdateLanguageController::class, 'updateLanguage'])->name('profile.update.language');
Route::patch('/profile/{user}/update/country', [UserUpdateCountryController::class, 'updateCountry'])->name('profile.update.country');
Route::patch('/profile/{user}/name', [UserUpdateNameController::class, 'updateName'])->name('profile.update.name');
Route::delete('/profile/{user}delete/{code}/language', [UserDeleteLanguageController::class, 'deleteLanguage'])->name('profile.delete.language');
Route::delete('/profile/{user}delete/account', [UserDeleteAccountController::class, 'deleteAccount'])->name('profile.delete.account');

// connection
Route::get('/connections/show/{user:name}', [ConnectionController::class, 'show'])->name('connection.show');
Route::post('/connection/request/{user}', [ConnectionController::class, 'store'])->name('connection.store');
Route::delete('/connection/discard/{user}', [ConnectionController::class, 'distroy'])->name('connection.distroy');


// admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::delete('/admin/{user}/delete', [AdminController::class, 'destroy'])->name('admin.destroy');


