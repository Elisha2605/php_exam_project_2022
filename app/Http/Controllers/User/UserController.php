<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{

    public function show(User $user)
    {
        return view('user.profile', [
            'user' => $user, 
        ]);
    }
}
