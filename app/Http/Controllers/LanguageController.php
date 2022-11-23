<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $languages = $user->languages;
        $all_languages = Language::pluck('name', 'code')->all();
        return view('language', compact('all_languages', 'user', 'languages'));
    }

    public function store(Request $request)
    {

        $selected_languages = $request->languages;

        $result = DB::table('languages')
            ->select('id')
            ->whereIn('code', $selected_languages)
            ->get();

        $language_id = $result->pluck('id');

        // banch insert
        $data = [];
        foreach ($language_id as $id) {
            $data[] = [
                'user_id'    => auth()->user()->id,
                'lang_id'    => $id,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ];
        }
        DB::table('user_languages')->insert($data);

        return redirect()->back();
    }
}
