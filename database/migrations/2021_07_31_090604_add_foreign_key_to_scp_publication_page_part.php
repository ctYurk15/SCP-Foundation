<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToScpPublicationPagePart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scp_publication_page_part', function (Blueprint $table) {
            $table->integer('publication_id')->unsigned();
            $table->foreign('publication_id')->references('id')->on('scp_publication');
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
            $table->dropForeign('scp_publication_publication_id_foreign');
            $table->dropIndex('scp_publication_publication_id_index');
            $table->dropColumn('publication_id');
        });
    }
}
