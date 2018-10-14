<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnToAlumniCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumni_company', function (Blueprint $table) {
            //
            $table->dropColumn('time');
            $table->date('start_time')->after('salary');
            $table->date('quit_time')->after('start_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumni_company', function (Blueprint $table) {
            //
            $table->date('time');
            $table->dropColumn('start_time');
            $table->dropColumn('quit_time');
        });
    }
}
