<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Language;
use App\Models\Country;

class UserUpdateProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function updateProfile(Request $request, $id)
    {
        return view('user.update-profile', [
            'user' => User::findOrFail($id), 
            'languages' => Language::all(),
            'countries' => Country::all()
        ]);
    }
}
