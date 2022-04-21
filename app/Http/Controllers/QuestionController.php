<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Studygroup;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Score;

class QuestionController extends Controller
{
    
    
    public function create(Studygroup $studygroup, Course $course){
        return view("question.create", compact("studygroup", "course"));
    }


    public function store(){

        $studygroup = request()["studygroup_id"];
        $data = request()->validate([
            'course_id' => '',
            'asked_question' => 'required',
            'answer_a' => 'required',
            'answer_b' => 'required',
            'answer_c' => 'required',
            'answer_d' => 'required',
            'correct_answer' => 'required',
        ]);
        
        
        auth()->user()->questions()->create($data);
        auth()->user()->solved_questions()->toggle(Question::latest()->first()->id);
      
        $score = auth()->user()->scores->where("studygroup_id", $studygroup)->first()->score;
        $score += 1;
        Score::where("studygroup_id", $studygroup)->where("user_id", auth()->user()->id)->update(["score" => $score]);

        dd($data);

    }

    public function show(Studygroup $studygroup, Course $course){
        return view("question.show", compact("studygroup", "course"));
    }


    
    public function solved(Request $request){
        
        $question_id = $request->question_id;
        $chosen_answer = Question::where("id", $question_id)->get($request->answer)->first()[$request->answer]; 
        $correct_answer = Question::find($question_id)->correct_answer;
        $studygroup_id = $request->studygroup_id;

        // dd($question_id);
        // dd($question_id);
        // dd($request->answer);
        // dd($chosen_answer);
        // dd($correct_answer);
        
        if($chosen_answer == $correct_answer){

            $score = auth()->user()->scores->where("studygroup_id", $studygroup_id)->first()->score;
            $score += 1;
            Score::where("studygroup_id", $studygroup_id)->where("user_id", auth()->user()->id)->update(["score" => $score]);
            
        }
        auth()->user()->solved_questions()->toggle($question_id);
        dd($request->all());
        
    }
}
