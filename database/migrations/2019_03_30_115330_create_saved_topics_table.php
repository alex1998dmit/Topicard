<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavedTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('saved_topics')) {
            Schema::create('saved_topics', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id')->unsigned();
                $table->bigInteger('topic_id')->unsigned();
                $table->text('comment')->default(NULL);
                $table->timestamps();
            });
        }

        Schema::table('saved_topics', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('topic_id')->references('id')->on('topics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saved_topics');
    }
}
