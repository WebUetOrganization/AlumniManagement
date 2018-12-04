<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('questions', function (Blueprint $table){
            $table->increments('id');
            $table->string('content');
            $table->string('type');
            $table->unsignedInteger('survey_id');
            $table->foreign('survey_id')
                ->references('id')
                ->on('survey')
                ->ondelete('cascade')
                ->onupdate('cascade');
            $table->timestamps();
        });
        Schema::create('answers', function (Blueprint $table){
            $table->increments('id');
            $table->string('answer');
            $table->unsignedInteger('question_id');
            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->ondelete('cascade')
                ->onupdate('cascade');
            $table->timestamps();
        });
        Schema::create('do_survey', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('survey_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('answer_id');
            $table->foreign('survey_id')
                ->references('id')
                ->on('survey')
                ->ondelete('cascade')
                ->onupdate('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->ondelete('cascade')
                ->onupdate('cascade');
            $table->timestamps();
        });
        Schema::create('answer_question', function (Blueprint $table){
            $table->unsignedInteger('do_id');
            $table->unsignedInteger('answer_id');
            $table->foreign('answer_id')
                ->references('id')
                ->on('answers')
                ->ondelet('cascade')
                ->onupdate('cascade');
            $table->foreign('do_id')
                ->references('id')
                ->on('do_survey')
                ->ondelet('cascade')
                ->onupdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_question');
        Schema::dropIfExists('do_survey');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('survey');
    }
}
