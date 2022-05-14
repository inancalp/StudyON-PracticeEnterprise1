<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;
use App\Models\Studygroup;
class Question extends Model
{
    use HasFactory;

    protected $table = "questions";
    protected $fillable = [
        "course_id",
        "studygroup_id",
        "asked_question",
        "answer_a",
        "answer_b",
        "answer_c",
        "answer_d",
        "correct_answer",
        ];


    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function solved_by(){
        return $this -> belongsToMany(User::class);
    }

    public function studygroup(){
        return $this->belongsTo(Studygroup::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

}
