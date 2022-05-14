<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Question;
use App\Models\Questionbank;
use Illuminate\Notifications\Notifiable;

class Studygroup extends Model
{
    use HasFactory, Notifiable;
    // copied from user
    protected $table = "studygroups";
    protected $fillable = [
        'user_id',
        'name',
        'password',
        'description',
    ];

    // THIS ONE IS USED FOR THE SINGLE ADMIN PURPOSES YET IT MIGHT CHANGE WITH AN UPDATE
    public function user(){
        return $this->belongsTo(User::class);
    }

    function members(){
        return $this->belongsToMany(User::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function studychats(){
        return $this->hasMany(Studychat::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function bank_questions(){
        return $this->hasMany(Questionbank::class);
    }

}
