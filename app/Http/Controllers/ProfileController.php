<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() 
    {
        $user = Auth::user();
        $country = $user->country;
        $languages = $user->languages;
        return view('profile', compact('user', 'country', 'languages'));
    }
    public function editBio(Request $request, $id)
    {
        $this->validate($request, [
            'bio'=>'required|max:500'
        ]);
        User::find($id)->update([
            'bio' => $request->bio,
        ]);
        
        return redirect()->back();
    }
    public function editAvatar(Request $request, $id)
    {
        $this->validate($request, [
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000' // max 10000kb
        ]);
        if($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image_path = public_path('/uploads/avatars');

            $image->move($image_path, $image_name);

            User::find($id)->update([
                'avatar' => $image_name
            ]);
        }
        
        return redirect()->back();
    }
    
}
