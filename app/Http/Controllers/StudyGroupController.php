<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyGroup;

class StudyGroupController extends Controller
{
    function create_group(Request $request){

        $request->validate([
            "name" => "required|min:3",
            "password" => "required|min:3"
        ]);

        $name = $request->name; // $request->adsoyad == form.blade ->> input name = "adsoyad"
        $password = $request->password;
        $description = $request->description;

        StudyGroup::create([
            "name"=>$name,
            "password"=>$password,
            "description"=>$description,
        ]); 

        return view("home");
        
    }
}
