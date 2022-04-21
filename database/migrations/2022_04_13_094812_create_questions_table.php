<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->bigInteger("course_id")->nullable();
            $table->string("asked_question")->nullable();
            $table->string("answer_a")->nullable();
            $table->string("answer_b")->nullable();
            $table->string("answer_c")->nullable();
            $table->string("answer_d")->nullable();
            $table->string("correct_answer")->nullable();
            $table->timestamps();
            $table->index("user_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
