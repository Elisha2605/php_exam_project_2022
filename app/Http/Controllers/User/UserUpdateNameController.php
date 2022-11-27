<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserUpdateNameController extends Controller
{
    public function updateName(Request $resquest, $id) {
        $this->validate($resquest, [
            'name' => 'max:255',
            'lastname' => 'max:255'
        ]);
        User::find($id)->update([
            'name' => $resquest->name,
            'lastname' => $resquest->lastname,
            'updated_at' => NOW()
        ]);

        return redirect()->back();
    }
}