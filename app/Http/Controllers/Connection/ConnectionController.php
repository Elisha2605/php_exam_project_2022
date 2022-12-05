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

        return view('connection.connection', [
            "user" => $user,
            "pending_requests" => $pending_requests,
            "approved_requests" => $approved_requests
        ]);
    }

    public function store(Request $request, User $user)
    {

        DB::table('user_connections')->insert([
            'user_from' => $request->user()->id,
            'user_to' => $user->id,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        return redirect()->back();
    }

    public function distroy(Request $request, User $user)
    {
        // dd($user);
        DB::table('user_connections')
            ->where('user_from', $user->id)
            ->orWhere('user_to', $request->id)

            ->orWhere('user_from', $request->id)
            ->orWhere('user_to', $user->id)
            ->delete();

        return redirect()->back();
    }
}
