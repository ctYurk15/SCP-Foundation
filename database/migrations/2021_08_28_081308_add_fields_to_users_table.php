<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('login')->after('id');
            $table->string('sex')->after('password');
            $table->integer('access_level')->after('sex');
            $table->date('birthdate')->after('access_level');
            $table->text('home_address')->after('access_level');
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
            $table->dropColumn('login');
            $table->dropColumn('sex');
            $table->dropColumn('access_level');
            $table->dropColumn('birthdate');
            $table->dropColumn('home_address');
        });
    }
}
