<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserUpdateBioController extends Controller
{
    public function updateBio(Request $request, User $user)
    {
        $this->validate($request, [
            'bio'=>'max:400'
        ]);
        User::find($user->id)->update([
            'bio' => $request->bio,
        ]);
        return redirect()->back();
    }
}
