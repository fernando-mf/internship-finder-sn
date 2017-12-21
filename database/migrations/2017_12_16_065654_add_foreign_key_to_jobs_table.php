<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs',function($table){
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('jobcategory_id')->references('id')->on('job_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs',function($table){
            $table->dropForeign(['company_id']);
            $table->dropForeign(['jobcategory_id']);
        });
    }
}
