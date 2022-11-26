<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserUpdateBioController extends Controller
{
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
