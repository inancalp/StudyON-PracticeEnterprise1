<?php

namespace App\Http\Controllers;

use App\Models\Repeaton;
use Illuminate\Http\Request;

class RepeatOnController extends Controller
{
    
    public function show_easy(){

        return view("repeaton.easy");

    }

    public function show_medium(){

        return view("repeaton.medium");
        
    }

    public function show_hard(){

        return view("repeaton.hard");
        
    }

    public function move_easy(Repeaton $repeat_question){

        $repeat_question->easy = 1;
        $repeat_question->medium = 0;
        $repeat_question->hard = 0;
        $repeat_question->save();

        dd($repeat_question);

    }

    public function move_medium(Repeaton $repeat_question){

        $repeat_question->easy = 0;
        $repeat_question->medium = 1;
        $repeat_question->hard = 0;
        $repeat_question->save();

        dd($repeat_question);

    }

    public function move_hard(Repeaton $repeat_question){

        $repeat_question->easy = 0;
        $repeat_question->medium = 0;
        $repeat_question->hard = 1;
        $repeat_question->save();

        dd($repeat_question);
        
    }

}
