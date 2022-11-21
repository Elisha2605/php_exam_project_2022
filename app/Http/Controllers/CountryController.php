<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
   public function index() {
        $all_countries = Country::pluck('name', 'code')->all(); // 'AF' => 'Afganistan'
        return view('country', compact('all_countries')); //compact -> returns all_countries[]
   }

   public function store(Request $request) {

      $selected_data = $request->contries;

      $idList = implode(',', $selected_data);
      dd($selected_data);

      return redirect()->route('dashboard');
  }
}
