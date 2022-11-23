<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
   public function index() {
      $user = Auth::user();
      $country = $user->country;
      $all_countries = Country::pluck('name', 'code')->all(); // 'AF' => 'Afganistan'
      return view('country', compact('all_countries', 'country')); //compact -> returns all_countries[]
   }

   public function store(Request $request) {
      $selected_data = $request->country;
      $user_id = Auth::user()->id;

      $query = DB::table('countries')
         ->select('id')
         ->where('code', $selected_data)
         ->get();

      $code_id = $query->pluck('id');
      
      $data = [
         'user_id' => $user_id,
         'country_id' => $code_id[0],
         'created_at' => NOW(),
         'updated_at' => NOW()
      ];
      
      DB::table('user_country')->insert($data);

      return redirect()->back();
  }
}
