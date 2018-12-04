<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoJoinQaView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW do_join_qa AS
            SELECT `qa`.`answer_id` AS `answer_id`
            FROM
                (
                    `todolist`.`do_survey` `ds`
                JOIN `todolist`.`answer_question` `qa`
                ON
                    ((`ds`.`id` = `qa`.`do_id`))
                )
            WHERE
                (`ds`.`survey_id` = 1)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW do_join_qa");
    }
}
