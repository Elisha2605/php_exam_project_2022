<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show() 
    {
        $users = User::all();
        if (Auth::user()->is_admin) {
            $users = User::all();
        }elseif (!Auth::user()->is_dane) {
            $users = $users->where('is_admin', false)->where('is_dane');
        } elseif (Auth::user()->is_dane) {
            $users = $users->where('is_admin', false)->whereNotIn('is_dane', true);
        } else {
            return;
        }

        

        return view('home.users', [ 'users'=>$users ]);
    }
}
