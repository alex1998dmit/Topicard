<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('like_topic')) {
            Schema::create('like_topic', function (Blueprint $table) {
                $table->engine = 'MyISAM';
                $table->bigIncrements('id');
                $table->bigInteger('topic_id')->unsigned();
                $table->bigInteger('like_id')->unsigned();
                $table->foreign('topic_id')->references('id')->on('topics');
                $table->foreign('like_id')->references('id')->on('likes');
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
        Schema::dropIfExists('like_topic');
    }
}
