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
use App\Http\Controllers\Home\HomeController;
use App\Models\User;

use App\Http\Controllers\TestController;

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

//index
// Route::get('/', function() {
//     $users = User::all();
//     return view('home', compact('users'));
// })->name('index');

//home
Route::get('/profile/users', [HomeController::class, 'show'])->name('home.show');


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


Route::patch('/user/{user}/profile/update/bio', [UserUpdateBioController::class, 'updateBio'])->name('profile.update.bio');
Route::patch('/user/{user}/profile/update/avatar', [UserUpdateAvatarController::class, 'updateAvatar'])->name('profile.update.avatar');
Route::patch('/user/{user}/profile/update/language', [UserUpdateLanguageController::class, 'updateLanguage'])->name('profile.update.language');
Route::patch('/user/{user}/profile/update/country', [UserUpdateCountryController::class, 'updateCountry'])->name('profile.update.country');
Route::patch('/user/{user}/profile/name', [UserUpdateNameController::class, 'updateName'])->name('profile.update.name');
Route::delete('/user/{user}/profile/delete/{code}/language', [UserDeleteLanguageController::class, 'deleteLanguage'])->name('profile.delete.language');
Route::delete('/user/{user}/profile/delete/account', [UserDeleteAccountController::class, 'deleteAccount'])->name('profile.delete.account');


// admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::delete('/admin/{user}/delete', [AdminController::class, 'destroy'])->name('admin.destroy');


