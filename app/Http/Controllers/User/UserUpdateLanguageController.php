<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserUpdateLanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function updateLanguage(Request $request, User $user)
    {
        // getting code id from db
        $query = DB::table('languages')
            ->select('id')
            ->whereIn('code', $request->languages)
            ->get();
        $language_id = $query->pluck('id');

        // banch insert
        $data = [];
        foreach ($language_id as $lang_id) {
            $data[] = [
                'user_id'    => $user->id,
                'lang_id'    => $lang_id,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ];
        }
        DB::table('user_languages')->insert($data);

        return redirect()->back();
    }
}
