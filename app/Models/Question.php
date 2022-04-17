<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Question extends Model
{
    use HasFactory;

    protected $table = "questions";
    protected $fillable = [
        "course_id",
        "question",
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
        $this -> belongsToMany(User::class);
    }

}
