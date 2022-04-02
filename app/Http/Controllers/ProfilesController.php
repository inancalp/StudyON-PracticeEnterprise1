<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User; // DO NOT EVER FORGET :)


// profile_page($user) --> $user represents user's ID in DB.
    // User::find($user) --> finds the information of the user with the ID
        // 
class ProfilesController extends Controller
{
    function profile_page($user){
        $_user = User::find($user);

        // dd($user);
        // 'user_' is the variable name inside our blade file (not $user !!)
            // which becomes $user_ in the blade file -lol-
        return view("profile", [
            'user_' => $_user,
        ]);

    }
}
