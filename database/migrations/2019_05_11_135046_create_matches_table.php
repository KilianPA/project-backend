<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id')->unsigned()->nullable();
            $table->integer('receiver_id')->unsigned()->nullable();
            $table->boolean('is_matched');
        });
        Schema::table('matches', function (Blueprint $table){
            $table->foreign('sender_id')
                ->references('id')->on('users');
            $table->foreign('receiver_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
