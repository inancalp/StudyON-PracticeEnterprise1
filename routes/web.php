<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudyGroupController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudyGroupJoinController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RepeatOnController;
use App\Http\Controllers\StudyChatController;
use App\Http\Controllers\QuestionBankController;
use Illuminate\Support\Carbon;
use App\Models\Question;
use App\Models\Questionbank;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [StudyGroupController::class, "welcome"]);

Auth::routes();

// TRY NOT TO TOUCH THE HOME ROUTE
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 
Route::get("/user/profile", [ProfileController::class, "profile_user"])->name("user.profile");
Route::get("/user/profile/{user}", [ProfileController::class, "show"])->name("profile.show");

Route::get("/studygroup/create", [StudyGroupController::class, "create"]);
Route::post("/studygroup", [StudyGroupController::class, "store"])->name("studygroup.store");
Route::get("/studygroup/{studygroup}", [StudyGroupController::class, "show"])
    ->middleware("checkIfAuth")
    ->name("studygroup.show");
Route::get("/studygroup", [StudyGroupController::class, "index"])->name("studygroup.index");
Route::post("/studygroup/join-successful", [StudyGroupController::class, "join"])->name("studygroup.join");


Route::get("/studygroup/{studygroup}/course/create", [CourseController::class, "create"])->name("course.create");
Route::post("/studygroup/course", [CourseController::class, "store"])->name("course.store"); //dd




Route::get("/studygroup/{studygroup}/course/{course}/question/create", [QuestionController::class, "create"])->name("question.create");
            // ALT--
            // "/studygroup/{studygroup}/course/{course}/question/create/created"
Route::post("/studygroup/course/question", [QuestionController::class, "store"])->name("question.store"); //dd


Route::get("/studygroup/{studygroup}/course/{course}/questions", [QuestionController::class, "show"])
    ->middleware("checkIfAuth") 
    ->name("question.show");

Route::post("/question-solved", [QuestionController::class, "solved"])->name("question.solved");





Route::get("/repeat-on/easy", [RepeatOnController::class, "show_easy"])->name("repeaton.easy");
Route::get("/repeat-on/medium", [RepeatOnController::class, "show_medium"])->name("repeaton.medium");
Route::get("/repeat-on/hard", [RepeatOnController::class, "show_hard"])->name("repeaton.hard");

Route::get("/repeat-on/move-question-easy/{repeat_question}", [RepeatOnController::class, "move_easy"]);
Route::get("/repeat-on/move-question-medium/{repeat_question}", [RepeatOnController::class, "move_medium"]);
Route::get("/repeat-on/move-question-hard/{repeat_question}", [RepeatOnController::class, "move_hard"]);


Route::get("/studygroup/{studygroup}/study-chat", [StudyChatController::class, "show"]);
Route::post("/studygroup/{studygroup}/study-chat/text-posted", [StudyChatController::class, "store"])->name("studychat.store");

Route::post("/studygroup/{studygroup}/study-chat/delete-message", [StudyChatController::class, "delete"]);



Route::get("/studygroup/{studygroup}/question-bank", [QuestionBankController::class, "show"])->name("questionbank.show");


// AJAX
Route::get("/markAsRead", function(){
    auth()->user()->unreadNotifications->markAsRead();
});

// ---CARBON---
Route::get("/time", function(){

    $current = Carbon::now();
    $current->setTimezone('Europe/Amsterdam');
    return $current->format('Y-m-d H:i:s');

});


// playAround
Route::get("/play", function(){

    $now = Carbon::now();
    
    $questions = Question::get();

    foreach($questions as $question){
        $then = new Carbon($question->created_at);
        $difference = ($then->diff($now)->days);
        // print_r($question->studygroup_id);
        $bank_question = new Questionbank();

        $bank_question->studygroup_id = $question->studygroup_id;
        $bank_question->question = $question->asked_question;
        $bank_question->correct_answer = $question->correct_answer;
        $bank_question->push();
        // $bank_question->studygroup_id = 
        
        // if($difference > 7){
            
        // }
    }

});