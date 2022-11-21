<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index() {
        $all_languages = Language::pluck('name', 'code')->all();
        // dd($all_languages);
        return view('language', compact('all_languages'));
    }

    public function store(Request $request) {

        $selected_languages = $request->languages;

        dd($selected_languages);

        return redirect()->route('dashboard');
    }
}