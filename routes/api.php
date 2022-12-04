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
Route::get('/connection', function() {
    
    $AuthUser = User::find(1);
    // $requests = $AuthUser->connection_received;

    $query = DB::select('SELECT uc1.user_from, uc1.user_to 
                                from user_connections uc1 left join
                                user_connections uc2 on uc2.user_from = uc1.user_to and uc2.user_to = uc1.user_from
                                where uc2.user_from is null and uc1.user_to ='.$AuthUser->id.'
                        '); 


    return $query;
});