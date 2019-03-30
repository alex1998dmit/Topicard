<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('category_topic')) {
            Schema::create('category_topic', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('category_id')->unsigned();
                $table->bigInteger('topic_id')->unsigned();
                $table->foreign('category_id')->references('id')->on('categories');
                $table->foreign('topic_id')->references('id')->on('topics');
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
        Schema::dropIfExists('category_topic');
    }
}
