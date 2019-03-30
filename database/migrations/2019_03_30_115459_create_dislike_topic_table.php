<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDislikeTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('like_topic')) {
            Schema::create('dislike_topic', function (Blueprint $table) {
                $table->engine = 'MyISAM';
                $table->bigIncrements('id');
                $table->bigInteger('topic_id')->unsigned();
                $table->bigInteger('dislike_id')->unsigned();
                $table->foreign('topic_id')->references('id')->on('topics');
                $table->foreign('dislike_id')->references('id')->on('dislikes');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dislike_topic');
    }
}
