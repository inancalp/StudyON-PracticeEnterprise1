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
            $table->unsignedBigInteger("course_id");
            $table->string("question")->nullable();
            $table->string("answer1")->nullable();
            $table->string("answer2")->nullable();
            $table->string("answer3")->nullable();
            $table->string("answer4")->nullable();
            $table->string("correctanswer")->nullable();
            $table->timestamps();
            $table->index("course_id");
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
