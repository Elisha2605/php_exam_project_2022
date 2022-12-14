<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function index() {
        return view('auth.login');
    }
    public function store(Request $request) {

        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        
        //log the user in
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        };
        if (Auth::user()->is_admin) {
            return redirect()->route('admin');
        }
        return redirect()->route('home.show');
    }
}