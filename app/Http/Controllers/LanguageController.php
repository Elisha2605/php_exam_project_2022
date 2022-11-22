<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    public function index()
    {
        $all_languages = Language::pluck('name', 'code')->all();
        return view('language', compact('all_languages'));
    }

    public function store(Request $request)
    {

        $selected_languages = $request->languages;

        $result = DB::table('languages')
            ->select('id')
            ->whereIn('code', $selected_languages)
            ->get();

        $language_id = $result->pluck('id');

        $data = [];
        foreach ($language_id as $id) {
            $data[] = [
                'user_id'    => auth()->user()->id,
                'lang_id'    => $id,
            ];
        }
        DB::table('user_languages')->insert($data);

        return redirect()->route('dashboard');
    }
}
