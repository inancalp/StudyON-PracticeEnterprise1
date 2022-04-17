<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class SolvedQuestionController extends Controller
{
    public function store(Request $request){
        
        $question_id = $request["question_id"];
        // question or question->id ???
        auth()->user()->solvedquestions()->toggle($question_id);

        dd(User::find(auth()->user()->id)->solvedquestions());

    }
    
}
