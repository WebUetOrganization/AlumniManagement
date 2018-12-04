<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountAnswersView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW count_answer AS
            SELECT
                `qa`.`survey_id` AS `survey_id`,
                `qa`.`content` AS `content`,
                `qa`.`description` AS `description`,
                `qa`.`answer` AS `answer`,
                `qa`.`id` AS `answer_id`,
                COUNT(`dq`.`answer_id`) AS `answer_count`
            FROM
                (
                    `todolist`.`question_join_answer` `qa`
                LEFT JOIN `todolist`.`do_join_qa` `dq`
                ON
                    ((`qa`.`id` = `dq`.`answer_id`))
                )
            GROUP BY
                `qa`.`id`
            ORDER BY
                `qa`.`content`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW count_answer");
    }
}
