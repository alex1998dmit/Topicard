<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('category_user')) {
            Schema::create('category_user', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('category_id')->unsigned();
                $table->bigInteger('user_id')->unsigned();
                $table->foreign('category_id')->references('id')->on('categories');
                $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('category_user');
    }
}
