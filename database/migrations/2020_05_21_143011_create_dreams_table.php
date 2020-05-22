<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dreams', function (Blueprint $table) {
            $table->id();
            $table->enum('status', array('draft', 'publish'));
            $table->integer('user_id')->unsigned();
            $table->integer('type_id')->nullable();
            $table->integer('emotion_id')->nullable();
            $table->integer('techniques_id')->nullable();
            $table->integer('mood_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->string('title', 255);
            $table->text('content');
            $table->timestamp('date');
            $table->integer('is_in_first_person');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dreams');
    }
}
