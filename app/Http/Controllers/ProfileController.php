<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        $country = $user->country;
        $languages = $user->languages;
        return view('profile', compact('user', 'country', 'languages'));
    }
    public function store(Request $request)
    {
        dd($request->bio);
    }
}
