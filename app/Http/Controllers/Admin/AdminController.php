<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{      
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        // Only Admin has access
        if (!Auth::user() == Auth::user()->is_admin) {
            abort(403);
        }
        
        $users = User::paginate(4);
        return view('admin.admin-panel', ['users' => $users]);
    }
    public function destroy(User $user) {
        $user->delete();
        return redirect()->back();
    }
}
