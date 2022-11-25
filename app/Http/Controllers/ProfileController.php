<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Language;

class ProfileController extends Controller
{
    public function index() 
    {
        $user = Auth::user();
        $country = $user->country;
        $languages = $user->languages;
        $all_languages = Language::pluck('name', 'code')->all();
        return view('profile', compact('user', 'country', 'languages', 'all_languages'));
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
    public function editLanguages(Request $request, $id)
    {

        // getting code id from db
        $result = DB::table('languages')
            ->select('id')
            ->whereIn('code', [$request->languages])
            ->get();

        $language_id = $result->pluck('id');

        // banch insert
        $data = [];
        foreach ($language_id as $lang_id) {
            $data[] = [
                'user_id'    => $id,
                'lang_id'    => $lang_id,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ];
        }
        DB::table('user_languages')->insert($data);

        return redirect()->back();
    }
    
}
