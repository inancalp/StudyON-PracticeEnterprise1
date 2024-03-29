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
        
        $studygroup = $request->hidden;
        $data = request()->validate([
            'title' => 'required|min:5',
        ]);
        
        Studygroup::find($studygroup)->courses()->create($data);

        return redirect("/studygroup/$studygroup");
        
    }

    public function show(Course $course){
        return view("course.show", compact("course"));
    }

}
