<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('topic_user')) {
            Schema::create('topic_user', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('topic_id')->unsigned();
                $table->bigInteger('user_id')->unsigned();
                $table->foreign('topic_id')->references('id')->on('topics');
                $table->foreign('user_id')->references('id')->on('users');
                $table->boolean('isLike')->default(0);
                $table->boolean('isDislike')->default(0);
                $table->boolean('isRepost')->default(0);
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
        Schema::dropIfExists('topic_user');
    }
}
