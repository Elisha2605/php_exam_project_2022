<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserDeleteLanguageController extends Controller
{
    public function deleteLanguage(User $user, $language)
    {
        $user->languages()->where('lang_id', $language)->delete();
        return redirect()->back();
    }
}
