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
        Schema::dropIfExists('correct_answers');
        Schema::table('answers', function (Blueprint $table) {
            $table->boolean('correct_answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn('correct_answer');
        });
        Schema::create('correct_answers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('answer_id');
            $table->integer('questions_id');
        });
    }
};
