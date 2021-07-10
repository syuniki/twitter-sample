<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('follow_id')->unsigned();
            $table->timestamps();

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('follow_id')->references('id')->on('users');

            // プライマリーキー設定
            $table->unique(['user_id', 'follow_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
