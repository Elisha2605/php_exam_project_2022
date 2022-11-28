<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserDeleteAccountController extends Controller
{
    public function deleteAccount($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('login');
    }
}