<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudyGroupController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudyGroupJoinController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

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
Route::get("/studygroup/{studygroup}", [StudyGroupController::class, "show"])->name("studygroup.show");
Route::get("/studygroup", [StudyGroupController::class, "index"])->name("studygroup.index");
Route::post("/studygroup/join-successfull", [StudyGroupController::class, "join"])->name("studygroup.join");


Route::get("/studygroup/{studygroup}/course/create", [CourseController::class, "create"])->name("course.create");
Route::post("/studygroup/course", [CourseController::class, "store"])->name("course.store"); //dd




Route::get("/studygroup/{studygroup}/course/{course}/create", [QuestionController::class, "create"])->name("question.create");
Route::post("/studygroup/course/question", [QuestionController::class, "store"])->name("question.store"); //dd

Route::get("/studygroup/{studygroup}/course/{course}/questions", [QuestionController::class, "show"])->name("question.show");