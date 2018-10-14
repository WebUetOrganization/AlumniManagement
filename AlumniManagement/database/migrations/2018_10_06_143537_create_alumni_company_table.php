<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumniCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_company', function (Blueprint $table) {
            $table->string('job', 255);
            $table->integer('salary');
            $table->unsignedInteger('alumni_id');
            $table->unsignedInteger('company_id');
            $table->foreign('alumni_id')
                ->references('id')
                ->on('alumni')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumni_company');
    }
}
