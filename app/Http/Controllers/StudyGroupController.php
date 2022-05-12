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



    public function store(){

        // dd(request()->user_id);
        // dd(request()->all());
        // $data["user_id"] = request()->user_id;

        $data = request()->validate([
            "user_id" => "",
            "name" => "required|min:3",
            "password" => "required|min:3",
            "description" => "",
        ]);

        $password = $data["password"];
        $password = Hash::make($password);
        $data["password"] = $password;
        // $data["password"] = $password;
        // dd($data);

        Studygroup::create($data);
        auth()->user()->member_of()->toggle(Studygroup::latest()->first()->id); //HERE I PUT THE USER DIRECTLY AS A MEMBER IN THE STUDY GROUP

        $score = new Score;
        $score->user_id = auth()->user()->id;
        $score->studygroup_id = Studygroup::latest()->first()->id;
        $score->save(); 

        return view("home");      
    }



    public function show(Studygroup $studygroup){
        // dd($studygroup);
        return view("studygroup.show", compact("studygroup"));
        // return view("studygroup.show", compact("name", "description"));
    }




    public function join(Request $request){

        $password = $request->password; //password input of user.
        $studygroup = $request->hidden;

        $hashedPassword = Studygroup::find($studygroup)->password;
        $hashCheck = Hash::check($password, $hashedPassword);

        // dd($hashCheck);

        
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
