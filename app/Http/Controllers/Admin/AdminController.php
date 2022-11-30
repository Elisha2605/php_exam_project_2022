<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show() {
        $users = User::paginate(4);
        return view('admin.admin-panel', ['users' => $users]);
    }
    public function adminDeleteUser(User $user) {
        $user->delete();
        return redirect()->back();
    }
}
