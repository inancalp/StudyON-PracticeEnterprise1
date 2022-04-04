<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyGroup;
use \App\Models\User;

class StudyGroupController extends Controller
{   
    function create(){
        return view("studygroup.create");
    }

    function store(){

        $data = request()->validate([
            "name" => "required|min:3",
            "password" => "required|min:3",
            "description" => "",
        ]);

        // with this way i am able to fetch the user_id to the study group automatically
        auth()->user()->studygroups()->create($data); //ADD NOTE

        // StudyGroup::create($data);
        dd(request()->all());
        return view("home");      
    }

    function show($studygroup_id){
        // dd($studygroup_id);
        return view("studygroup.show", compact("name", "description") ?? "Group does not exist");
    }
}
