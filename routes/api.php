<?php

use App\Models\Country;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// users
Route::get('/users', function() {
    return User::all();
});
// countries
Route::get('/countries', function() {
    return Country::all();
});
// languages
Route::get('/languages', function() {
    return Language::all();
});

Route::post('/login', function(Request $request) {
    if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
        return back()->with('status', 'Invalid login details');
    };
    return auth()->user();
});
Route::get('/pending-requests', function() {
    
    $AuthUser = User::find(1);
    $pending_requests = pendingRequests($AuthUser);
    return $pending_requests;
});
Route::get('/requests', function() {

    $AuthUser = User::find(1);
    
    $aproved_requests = approvedRequests($AuthUser);

    return count($aproved_requests);
});