<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyGroup;
use \App\Models\User;
use \App\Models\Score;
class StudyGroupController extends Controller
{   

    public function index(){
        $studygroups = StudyGroup::all();
        return view("studygroup.index", compact("studygroups"));
    }



    public function welcome(){
        $studygroups = StudyGroup::all();
        return view("welcome", compact("studygroups"));
    }



    public function create(){
        return view("studygroup.create");
    }



    public function store(){

        $data = request()->validate([
            "name" => "required|min:3",
            "password" => "required|min:3",
            "description" => "",
        ]);
        // with this way i am able to fetch the user_id to the study group automatically
        auth()->user()->studygroups()->create($data);
        auth()->user()->member_of()->toggle(Studygroup::latest()->first()->id); //HERE I PUT THE USER DIRECTLY AS A MEMBER IN THE STUDY GROUP

        $score = new Score;
        $score->user_id = auth()->user()->id;
        $score->studygroup_id = Studygroup::latest()->first()->id;
        $score->save(); 

        //ADD NOTE
        // StudyGroup::create($data);
        // dd(request()->all());
        return view("home");      
    }



    public function show(StudyGroup $studygroup){
        // dd($studygroup);
        return view("studygroup.show", compact("studygroup"));
        // return view("studygroup.show", compact("name", "description"));
    }




    public function join(Request $request){

        $password = $request->password; //password input of user.
        $studygroup = $request->hidden;
        
        if($password == Studygroup::find($studygroup)->password){

            auth()->user()->member_of()->toggle($studygroup);
            
            $score = new Score;
            $score->user_id = auth()->user()->id;
            $score->studygroup_id = $studygroup;
            $score->save(); 

            $studygroups = StudyGroup::all();
            return view("studygroup.index", compact("studygroups"));

        }
        else{
            return "WRONG PASSWORD!";
        }
        
        
    }

}
