<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudyGroupController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudyGroupJoinController;
use Illuminate\Support\Facades\Route;

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


// Route::get("/profile/{user}", [ProfileController::class, "profile"])->name("profile.show");
// Route::get("/profile/{user}", [ProfileController::class, "profile"])->name("profile-show");
 
Route::get("/user/profile", [ProfileController::class, "profile_user"])->name("user.profile");
Route::get("/user/profile/{user}", [ProfileController::class, "show"])->name("profile.show");
// Route::get("/home", [ProfileController::class, "profile_user"])->name("user.profile");


// Route::get("/question/{user}", [QuestionController::class, "question_create"])->name("questions.show");
// Route::get("/question/create", [QuestionController::class, "question_create"])->name("question.create");


// --------------
Route::post("/studygroup/join-successfull", [StudyGroupController::class, "join"])->name("studygroup.join");
// --------------

Route::get("/studygroup/create", [StudyGroupController::class, "create"]);
Route::post("/studygroup", [StudyGroupController::class, "store"])->name("studygroup.store");
Route::get("/studygroup/{studygroup}", [StudyGroupController::class, "show"])->name("studygroup.show");
Route::get("/studygroup", [StudyGroupController::class, "index"])->name("studygroup.index");