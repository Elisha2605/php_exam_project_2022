<?php

namespace App\Http\Controllers\Connection;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConnectionController extends Controller
{

    

    public function requestConnection(Request $request, User $user)
    {
        DB::table('user_connections')->insert([
            'user_from' => $request->user()->id,
            'user_to' => $user->id,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        return redirect()->back();
    }
}

