<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserUpdateAvatarController extends Controller
{
    public function updateAvatar(Request $request, User $user)
    {
        $this->validate($request, [
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000' // max 10000kb
        ]);
        if($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image_path = public_path('/uploads/avatars');

            $image->move($image_path, $image_name);

            User::find($user->id)->update([
                'avatar' => $image_name
            ]);
        }
        return redirect()->back();
    }
}
