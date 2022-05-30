<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Studygroup;
use App\Models\Question;
use App\Models\Spacedrepetition;
use App\Models\Studychat;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this -> hasOne(Profile::class);
    }

    public function studygroups(){
        return $this->hasMany(Studygroup::class);
    }

    public function member_of(){
        return $this->belongsToMany(Studygroup::class);
    }


    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function solved_questions(){
        return $this -> belongsToMany(Question::class);
    }
   

    public function scores(){
        return $this->hasMany(Score::class);
    }
    

    public function repeat_questions(){
        return $this->hasMany(Repeaton::class);
    }

    public function studychats(){
        return $this->hasMany(Studychat::class);
    }
}
