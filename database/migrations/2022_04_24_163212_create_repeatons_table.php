<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('repeatons', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->text("question");
            $table->text("correct_answer");
            $table->bigInteger("easy")->default("0");
            $table->bigInteger("medium")->default("1");
            $table->bigInteger("hard")->default("0");
            $table->timestamps();
            $table->index("user_id");
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('repeatons');
    }
    
};
