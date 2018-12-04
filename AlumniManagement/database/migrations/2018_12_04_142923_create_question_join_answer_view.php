<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsJoinAnswersView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE VIEW question_join_answer AS
            SELECT
            `q`.`survey_id` AS `survey_id`,
            `q`.`content` AS `content`,
            `q`.`description` AS `description`,
            `a`.`id` AS `id`,
            `a`.`answer` AS `answer`
        FROM
            (
                `todolist`.`questions` `q`
            JOIN `todolist`.`answers` `a`
            ON
                ((`q`.`id` = `a`.`question_id`))
            )");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW question_join_answer");
    }
}
