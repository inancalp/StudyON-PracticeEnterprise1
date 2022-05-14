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
        Schema::create('questionbanks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("studygroup_id");
            $table->text("question");
            $table->text("correct_answer");
            $table->timestamps();
            $table->index("studygroup_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionbanks');
    }
};
