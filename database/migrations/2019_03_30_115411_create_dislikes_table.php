<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDislikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dislikes')) {
            Schema::create('dislikes', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id')->unsigned();
                $table->timestamps();
            });
        }

        Schema::table('dislikes', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dislikes');
    }
}
