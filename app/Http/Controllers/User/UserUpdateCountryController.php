<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserUpdateCountryController extends Controller
{
    public function updateCountry(Request $request, User $user) {
        $query = DB::table('countries')
                    ->select('id')
                    ->where('code', $request->country)
                    ->get();

        $country_id = $query[0]->id;
        
        DB::table('user_country')
            ->where('user_id', $user->id)
            ->update([
                'country_id' => $country_id,
                'updated_at' => NOW()
        ]);

        return redirect()->back();
    }
}
