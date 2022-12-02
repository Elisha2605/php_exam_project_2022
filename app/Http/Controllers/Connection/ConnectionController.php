<?php

namespace App\Http\Controllers\Connection;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConnectionController extends Controller
{
    public function requestConnection(User $user, $id)
    {




        DB::table('user_connections')->insert([
            'user_from' => $user->id,
            'user_to' => $id
        ]);
        return redirect()->back();
    }
}
