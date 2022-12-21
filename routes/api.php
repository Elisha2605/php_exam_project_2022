<?php

use App\Models\Country;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    $users = User::all();
    return $users;
});
// countries
Route::get('/countries', function() {
    return Country::all();
});
// languages
Route::get('/languages', function() {
    return Language::all();
});

/**
 * Signup
 */
Route::post('/signup', function(Request $request) {
    try {
        $is_dane = ($request->country == 'DK') ? true : false;

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'date_of_birth' => $request->date_of_birth,
            'is_dane' => $is_dane
        ]);
        return response()->json([
            'Success' => 'user ' . $user->name . ' has signed up',
            'user' => $user
        ], 201);
    } catch (Exception $e) {
        report($e);
        return response()->json([
            'Error' => 'Upps... something went wrong', 
        ], 500);
    }
});

/**
 * Login
 * retruns json with the logged in user name
 */
Route::post('/login', function(Request $request) {
    try {
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return response()->json([
                'Error' => 'Invalid login details'
            ], 400);
        };
        return response()->json([
            'Success' => 'user ' . auth()->user()->name . ' logged in',
            'user' => auth()->user()
        ], 200);
    } catch (Exception $e) {
        report($e);
        return response()->json([
            'Error' => 'Upps... something went wrong', 
        ], 500);
    }
});

/**
 * Sent requests
 * returns boalean
 * checks if one the two users has sent a request to another
 */
Route::get('/sent-requests', function(Request $request) {
    try {
        $user_one = User::find(2);
        $user_two = User::find(11);
        
        if ($user_one->hasRequestFrom($user_two)) {
            return response()->json([
                'True' => 'Either ' . '(' . $user_one->name . ')' . ' or ' . '(' . $user_two->name . ')' . ' has sent a request' 
            ], 200);
        } else {
            return response()->json([
                'False' => 'Neither ' . '(' . $user_one->name . ')' . ' or ' . '(' . $user_two->name . ')' . ' has not sent a request' 
            ], 404);
        }
    } catch(TypeError $e) {
        report($e);
        return response()->json([
            'Error' => 'Upps... something went wrong', 
        ], 500);
    }
});

/**
 * Pending requests
 * returns a list of "X" user's pending requests
 */
Route::get('/pending-requests', function() {
    try {
        $AuthUser = User::find(2);
        $pending_requests = pendingRequests($AuthUser);
        return $pending_requests;
    } catch(TypeError $e) {
        report($e);
        return response()->json([
            'Error' => 'Upps... something went wrong', 
        ], 500);
    }
});

/**
 * Aproved requests 
 * List of users who have approved "X" user requests
 */
Route::get('/approved-requests', function() {
    try {
        $user = User::find(2);
        $aproved_requests = approvedRequests($user);
        return $aproved_requests;
    } catch(TypeError $e) {
        report($e);
        return response()->json([
            'Error' => 'Upps... something went wrong', 
        ], 500);
    }
});

/**
 * Send a request
 */
Route::post('/send-connection', function(Request $request) {
    try {
        $user_from = User::find($request->user_from);
        $user_to = User::find($request->user_to);
    
        if ($user_from->hasRequestFrom($user_to)) {
            DB::select('DELETE from user_connections
                        WHERE (user_from, user_to) IN 
                        (('.$user_from->id.', '.$user_to->id.')) '); 
            return response()->json([
                'Success' => 'Disconnection between ' . '(' . $user_from->name . ')' . ' and ' . 'user ' . '(' . $user_to->name . ')'
            ], 200);
        }
        DB::table('user_connections')->insert([
            'user_from' => $user_from->id,
            'user_to' => $user_to->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json([
            'Success' => 'Connection between ' . $user_from->name . ' and ' . 'user ' . $user_to->name
        ], 200);
    } catch(Exception $e) {
        report($e);
        return response()->json([
            'Error' => 'Upps... something went wrong'
        ], 500);
    }
});

/**
 * Delete a connection
 */
Route::post('/delete-connection', function(Request $request) {
    try {
        $user_from = User::find($request->user_from);
        $user_to = User::find($request->user_to);

        DB::select('DELETE from user_connections
                        WHERE (user_from, user_to) IN 
                        (('.$user_from->id.', '.$user_to->id.'), 
                        ('.$user_to->id.', '.$user_from->id.')) 
                  '); 
        return response()->json([
            'Success' => 'connection discard from: ' . 
                            '(' . $user_from->name . ')' . 
                            ' and ' . 
                            '(' . $user_to->name . ')'
        ], 200);
    } catch (Exception $e) {
        report($e);
        return response()->json([
            'Error' => 'Upps... something went wrong'
        ], 500);
    } 
});