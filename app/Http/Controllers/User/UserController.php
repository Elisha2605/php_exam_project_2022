<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Language;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id), 
            'languages' => Language::all(),
            'countries' => Country::all()
        ]);
    }
}
