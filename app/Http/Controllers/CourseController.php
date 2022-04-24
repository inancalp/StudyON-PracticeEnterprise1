<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Studygroup;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create(Studygroup $studygroup){
        return view("course.create", compact("studygroup"));
    }


    public function store(Request $request){

            // dd(request()->all());

        // !!!!VERY IMPORTANT
            // IF there is a field does not need any validation, needs to be added in data as empty string; EX: "none" => ""
            // Else it wont be pass throug \model\ ::create method!!!

        $studygroup = $request->hidden;
        $data = request()->validate([
            'title' => 'required|min:5',
        ]);
        

        Studygroup::find($studygroup)->courses()->create($data);

        dd($data);
        
    }

    public function show(Course $course){
        return view("course.show", compact("course"));
    }

}
