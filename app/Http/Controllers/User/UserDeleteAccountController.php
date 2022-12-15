<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserDeleteAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function deleteAccount(User $user)
    {
        $user->delete();
        return redirect()->route('login');
    }
}
