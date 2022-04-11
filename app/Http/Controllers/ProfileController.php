<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User; // DO NOT EVER FORGET :)


// profile_page($user) --> $user represents user's ID in DB.
    // User::find($user) --> finds the information of the user with the ID
        // 
class ProfileController extends Controller
{

    // //  function show(StudyGroup $studygroup){
    //     // dd($studygroup);
    //     return view("studygroup.show", compact("studygroup"));
    //     // return view("studygroup.show", compact("name", "description"));
    // }

    public function show(User $user){
        // dd($user);
        return view("profile.show", compact("user"));

    }

    public function profile_user(){
        
        return view("user.profile");
    }

    // public function profile_own($user){
    //     $user = 
    // }
//     public function change_description(){
        
//         $description = auth()->
//     }
}
