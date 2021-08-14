<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeIdToScpPublicationPagePart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scp_publication_page_part', function (Blueprint $table) {
            $table->integer('type_id')->nullable()->unsigned();
            $table->foreign('type_id')->references('id')->on('scp_page_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scp_publication_page_part', function (Blueprint $table) {
            $table->dropForeign('scp_page_type_type_id_foreign');
            $table->dropIndex('scp_page_type_type_id_index');
            $table->dropColumn('type_id');
        });
    }
}
