<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDeleteLanguageController extends Controller
{
    public function deleteLanguage(Request $request, $id)
    {
        $req = $request->all();
        $array_key = collect($req)->keys();

        foreach ($array_key as $lang_id) {
            DB::table('user_languages')
                ->where('user_id', $id)
                ->where('lang_id', $lang_id)
                ->delete();
        }
        return redirect()->back();
    }
}
