<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;

if (!function_exists('pendingRequests')) {
    function pendingRequests(User $user) {
        $query = DB::select('SELECT uc1.user_from, uc1.user_to 
                                FROM user_connections uc1 LEFT JOIN
                                user_connections uc2 ON uc2.user_from = uc1.user_to AND uc2.user_to = uc1.user_from
                                WHERE uc2.user_from IS NULL AND uc1.user_to ='.$user->id.'
                            '); 
        return $query;
    }
}

if (!function_exists('approvedRequests')) {
    function approvedRequests(User $user) {
        $query = DB::select('SELECT uc1.user_from, uc1.user_to 
                                FROM user_connections uc1 LEFT JOIN
                                user_connections uc2 ON uc2.user_from = uc1.user_to AND uc2.user_to = uc1.user_from
                                WHERE uc2.user_from ='.$user->id.'
                            '); 
        return $query;
    }
}