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
        Schema::create('studychats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->bigInteger("studygroup_id")->nullable();
            $table->string("text");
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
        Schema::dropIfExists('studychats');
    }
};
