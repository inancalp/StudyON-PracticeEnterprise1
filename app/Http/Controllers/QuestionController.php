<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Studygroup;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Score;
use App\Models\Repeaton;
use App\Notifications\QuizonNotification;


class QuestionController extends Controller
{
    
    public function show(Studygroup $studygroup, Course $course){
        return view("question.show", compact("studygroup", "course"));
    }
    
    public function create(Studygroup $studygroup, Course $course){

        if(auth()->user()->questions->where("course_id", $course->id)->first()){
            return abort(404);
        }
        return view("question.create", compact("studygroup", "course"));

    }

    public function store(){
        
        $data = request()->validate([
            'course_id' => '',
            'studygroup_id' => '',
            'asked_question' => 'required',
            'answer_a' => 'required',
            'answer_b' => 'required',
            'answer_c' => 'required',
            'answer_d' => 'required',
            'correct_answer' => 'required',
        ]);
        
        $studygroup_id = request()["studygroup_id"];
        $course_id = request()["course_id"];
        $studygroup = Studygroup::find($studygroup_id);
        $course = Course::find($course_id);
        $question = request()["asked_question"];
        $user = auth()->user();
        $studygroupMembers = $studygroup->members->whereNotIn("id", auth()->user()->id);
        $studygroupMembers->each->notify(new QuizonNotification($studygroup, $question, $course, $user));
        
        if (!Question::where("user_id", auth()->user()->id)->where("course_id", request()->course_id)->first()){

            auth()->user()->questions()->create($data);
            auth()->user()->solved_questions()->toggle(Question::latest()->first()->id);
        
            $score = auth()->user()->scores->where("studygroup_id", $studygroup_id)->first()->score;
            $score += 5;
            Score::where("studygroup_id", $studygroup_id)->where("user_id", auth()->user()->id)->update(["score" => $score]);

            return redirect("/studygroup/{$studygroup_id}");
        }
        else{
            return abort(404);
        }
        
    }
    
    public function solved(Request $request){
        
        $question_id = $request->question_id;
        $chosen_answer = Question::where("id", $question_id)->get($request->answer)->first()[$request->answer]; 
        $correct_answer = Question::find($question_id)->correct_answer;
        $studygroup_id = $request->studygroup_id;
        $course_id = $request->course_id;

        if($request->spacedrep){
            $repeaton = new Repeaton();
            $repeaton->user_id = auth()->user()->id;
            $repeaton->question = $request->question;
            $repeaton->correct_answer = $correct_answer;
            $repeaton->save();
        }
        if($chosen_answer == $correct_answer){
            $score = auth()->user()->scores->where("studygroup_id", $studygroup_id)->first()->score;
            $score += 5;
            Score::where("studygroup_id", $studygroup_id)->where("user_id", auth()->user()->id)->update(["score" => $score]);
        }

        auth()->user()->solved_questions()->toggle($question_id);
        return redirect("/studygroup/{$studygroup_id}/course/{$course_id}/questions");
    }


}
