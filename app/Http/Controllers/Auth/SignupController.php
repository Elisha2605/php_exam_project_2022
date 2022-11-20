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
        // validate
        $this->validate($request, [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            'date_of_birth' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb

        ]);
        // upload image
        if($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image_path = public_path('/uploads/avatars/');
            
            $image->move($image_path, $image_name);
            
            // create user with image
            User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'date_of_birth' => $request->date_of_birth,
                'avatar' => $image_name,
            ]);
        } else {
            // create without image
            User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'date_of_birth' => $request->date_of_birth,

            ]);
        }

        
        // redirect
        return redirect()->route('login');
    }
}
