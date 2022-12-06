<?php

namespace App\Http\Controllers\Connection;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ConnectionController extends Controller
{

    public function show(User $user)
    {
        $pending_requests = pendingRequests(Auth::user());
        $approved_requests = approvedRequests(Auth::user());
        $sent_requests = sentRequests(Auth::user());

        return view('connection.connection', [
            "user" => $user,
            "pending_requests" => $pending_requests,
            "approved_requests" => $approved_requests,
            "sent_requests" => $sent_requests
        ]);
    }

    public function store(Request $request, User $user)
    {

        DB::table('user_connections')->insert([
            'user_from' => $request->user()->id,
            'user_to' => $user->id,
            'created_at' => Carbon::now(env("APP_TIMEZONE")),
            'updated_at' => Carbon::now(env("APP_TIMEZONE")),
        ]);
        return redirect()->back();
    }

    public function distroy(Request $request, User $user)
    {
        DB::select('DELETE from user_connections
                        WHERE (user_from, user_to) IN 
                        (('.$user->id.', '.$request->user()->id.'), 
                        ('.$request->user()->id.', '.$user->id.')) 
                        '); 
        return redirect()->back();
    }
}
