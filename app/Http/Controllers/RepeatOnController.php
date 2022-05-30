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
    public function whereToMove($url){
        if($url == "http://127.0.0.1:8000/repeat-on/easy" || $url == "http://localhost:8000/repeat-on/easy"){
            return redirect("/repeat-on/easy");
        }
        if($url == "http://127.0.0.1:8000/repeat-on/medium" || $url == "http://localhost:8000/repeat-on/medium"){
            return redirect("/repeat-on/medium");
        }
        if($url == "http://127.0.0.1:8000/repeat-on/hard" || $url == "http://localhost:8000/repeat-on/hard"){
            return redirect("/repeat-on/hard");
        }
    }

    public function move_easy(Repeaton $repeat_question){
        $repeat_question->easy = 1;
        $repeat_question->medium = 0;
        $repeat_question->hard = 0;
        $repeat_question->save();
        $url = request()->session()->previousUrl();
        return $this->whereToMove($url);
    }

    public function move_medium(Repeaton $repeat_question){
        $repeat_question->easy = 0;
        $repeat_question->medium = 1;
        $repeat_question->hard = 0;
        $repeat_question->save();
        $url = request()->session()->previousUrl();
        return $this->whereToMove($url);
    }

    public function move_hard(Repeaton $repeat_question){
        $repeat_question->easy = 0;
        $repeat_question->medium = 0;
        $repeat_question->hard = 1;
        $repeat_question->save();
        $url = request()->session()->previousUrl();
        return $this->whereToMove($url);  
    }
}
