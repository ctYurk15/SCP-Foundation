<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToScpObjectPagePart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scp_object_page_part', function (Blueprint $table) {
            $table->integer('object_id')->unsigned();
            $table->foreign('object_id')->references('id')->on('scp_object');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scp_object_page_part', function (Blueprint $table) {
            $table->dropForeign('scp_object_object_id_foreign');
            $table->dropIndex('scp_object_object_id_index');
            $table->dropColumn('object_id');
        });
    }
}
