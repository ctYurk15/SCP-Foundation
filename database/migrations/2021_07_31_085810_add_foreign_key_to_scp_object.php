<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToScpObject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scp_object', function (Blueprint $table) {
            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('scp_object_class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scp_object', function (Blueprint $table) {
            $table->dropForeign('scp_object_class_class_id_foreign');
            $table->dropIndex('scp_object_class_class_id_index');
            $table->dropColumn('class_id');
        });
    }
}
