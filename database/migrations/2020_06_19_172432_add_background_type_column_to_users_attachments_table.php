<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBackgroundTypeColumnToUsersAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_attachments', function (Blueprint $table) {
            //
            $table->enum('background_type', ['hex', 'img'])->default('hex')->after('path_avatar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_attachments', function (Blueprint $table) {
            //
            $table->dropColumn('background_type');
        });
    }
}
