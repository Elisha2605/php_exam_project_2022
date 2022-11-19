<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image; 

class SignupController extends Controller
{
    public function index() {
        return view('auth.signup');
    }
    public function store(Request $request) {
        //validate
        $this->validate($request, [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            'date_of_birth' => 'required',

        ]);
        
        // create user
        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_of_birth' => $request->date_of_birth,

        ]);

        


        // redirect
        return redirect()->route('login');
    }
}
