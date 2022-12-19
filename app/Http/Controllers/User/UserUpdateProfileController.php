<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Language;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;

class UserUpdateProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function updateProfile($id)
    {
        if (!Auth::user()->id === $id) {
            abort(403, 'Unauthorized action.');
        }
        return view('user.update-profile', [
            'user' => User::findOrFail($id), 
            'languages' => Language::all(),
            'countries' => Country::all()
        ]);
    }
}
