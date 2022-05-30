<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studygroup;
use \App\Models\User;
use \App\Models\Score;
use Illuminate\Support\Facades\Hash;

class StudyGroupController extends Controller
{   

    public function index(){
        $studygroups = Studygroup::all();
        return view("studygroup.index", compact("studygroups"));
    }

    public function welcome(){
        $studygroups = Studygroup::all();
        return view("welcome", compact("studygroups"));
    }

    public function create(){
        return view("studygroup.create");
    }

    public function show(Studygroup $studygroup){
        return view("studygroup.show", compact("studygroup"));
    }
    

    public function store(){

        $data = request()->validate([
            "user_id" => "",
            "name" => "required|min:3",
            "password" => "required|min:3",
            "description" => "",
        ]);

        $password = $data["password"];
        $password = Hash::make($password);
        $data["password"] = $password;

        Studygroup::create($data);
        auth()->user()->member_of()->toggle(Studygroup::latest()->first()->id);

        $score = new Score;
        $score->user_id = auth()->user()->id;
        $score->studygroup_id = Studygroup::latest()->first()->id;
        $score->save(); 
        return view("home");      
    }
    
    
    public function join(Request $request){

        $password = $request->password;
        $studygroup = $request->hidden;

        $hashedPassword = Studygroup::find($studygroup)->password;
        $hashCheck = Hash::check($password, $hashedPassword);

        if($hashCheck){
            auth()->user()->member_of()->toggle($studygroup);
            $score = new Score;
            $score->user_id = auth()->user()->id;
            $score->studygroup_id = $studygroup;
            $score->save(); 
            $studygroups = Studygroup::all();
            return view("studygroup.index", compact("studygroups"));
        }
        else{
            return redirect("/studygroup/$studygroup");
        }
    }

}
