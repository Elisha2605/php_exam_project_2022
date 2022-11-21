<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function __construct() {    -> uncomment at the end of the project
    //     $this->middleware('auth');
    // }
    
    public function index() {
        return view('dashboard', array('user' => auth()->user()));
    }
}
