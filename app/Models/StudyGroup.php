<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class StudyGroup extends Model
{
    use HasFactory;
    // copied from user
    protected $table = "study_groups";
    protected $fillable = [
        'user_id',
        'name',
        'password',
        'description',
        "created_at",
        "updated_at",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
