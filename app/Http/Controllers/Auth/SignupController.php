<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Country;
use Image; 

class SignupController extends Controller
{
    public function index() {
        $all_countries = Country::pluck('name', 'code')->all();
        return view('auth.signup', compact('all_countries'));
    }
    public function store(Request $request) {
        // validate
        $this->validate($request, [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            'date_of_birth' => 'required',
            'country' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000' // max 10000kb
        ]);
        // upload image
        if($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image_path = public_path('/uploads/avatars/');
            
            $image->move($image_path, $image_name);
            
            // create user with image
            $user = User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'date_of_birth' => $request->date_of_birth,
                'avatar' => $image_name,
            ]);
        } else {
            // create without image
            $user = User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'date_of_birth' => $request->date_of_birth,
            ]);
        }
        
        // insert country
        $selected_data = $request->country;
        $user_id = $this->lastCreatedUserId = $user->id;

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
        
        // redirect
        return redirect()->route('login');
    }
}
