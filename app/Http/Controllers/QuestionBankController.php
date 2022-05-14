<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studygroup;

class QuestionBankController extends Controller
{
    public function show(Studygroup $studygroup)
    {
        return view("questionbank.show", compact("studygroup"));
    }
}