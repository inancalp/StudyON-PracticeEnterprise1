<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Studygroup;
use App\Models\Question;
use App\Models\Spacedrepetition;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function profile(){
        return $this -> hasOne(Profile::class);
    }




    // THIS ONE IS FOR THE SINGLE ADMIN PURPOSES YET IT MIGHT CHANGE WITH AN UPDATE
    public function studygroups(){
        return $this->hasMany(Studygroup::class);
    }

    public function member_of(){
        return $this->belongsToMany(Studygroup::class);
    }


    public function questions(){
        return $this->hasMany(Question::class);
    }

//    isn't it supposed to be hasMany(Question::class); ?
    public function solved_questions(){
        return $this -> belongsToMany(Question::class);
    }
   

    public function scores(){
        return $this->hasMany(Score::class);
    }
    

    public function repeat_questions(){

        return $this -> hasMany(Repeaton::class);

    }
    
}
