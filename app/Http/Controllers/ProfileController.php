<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        $country = $user->country;
        $languages = $user->languages;
        return view('profile', compact('user', 'country', 'languages'));
    }
    public function updateBio(Request $request, $id)
    {
        $this->validate($request, [
            'bio'=>'required|max:500'
        ]);
        User::find($id)->update([
            'bio' => $request->bio,
        ]);
        
        return redirect()->back();
    }
}
