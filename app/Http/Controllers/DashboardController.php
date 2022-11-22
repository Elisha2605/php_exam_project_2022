<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function __construct() {    -> uncomment at the end of the project
    //     $this->middleware('auth');
    // }
    
    public function index() {
        $user = Auth::user();
        $languages = $user->languages;
        return view('dashboard', compact('user', 'languages'));
    }
}
