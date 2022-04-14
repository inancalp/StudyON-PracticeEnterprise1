<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Studygroup;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;

class QuestionController extends Controller
{
    
    
    public function create(Studygroup $studygroup, Course $course){
        return view("question.create", compact("studygroup", "course"));
    }


    public function store(){

        $data = request()->validate([
            'course_id' => '',
            'question' => 'required',
            'answer_a' => 'required',
            'answer_b' => 'required',
            'answer_c' => 'required',
            'answer_d' => 'required',
            'correct_answer' => 'required',
        ]);
        
        auth()->user()->questions()->create($data);
        dd($data);

    }

    public function show(Studygroup $studygroup, Course $course){
        return view("question.show", compact("studygroup", "course"));
    }
}
