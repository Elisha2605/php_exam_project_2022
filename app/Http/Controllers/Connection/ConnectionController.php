<?php

namespace App\Http\Controllers\Connection;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ConnectionController extends Controller
{

    

    public function requestConnection(Request $request, User $user)
    {
        $user_from  = $request->user()->id;
        $user_to    = $user->id;

        // Elisha has request from Aïcha?
        // dd($user->connectionStatus($request->user()));

        // Elisha Accepted request from Mark?
        // dd($user->hasAcceptedRequest($request->user()));

        DB::table('user_connections')->insert([
            'user_from' => $user_from,
            'user_to' => $user_to
        ]);
        return redirect()->back();
    }
}
