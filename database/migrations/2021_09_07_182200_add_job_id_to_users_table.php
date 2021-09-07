<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('job_id')->nullable()->unsigned();
            $table->foreign('job_id')->references('id')->on('scp_job_positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_scp_job_positions_job_id_foreign');
            $table->dropIndex('users_scp_job_positions_job_id_index');
            $table->dropColumn('job_id');
        });
    }
}
