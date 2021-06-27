<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
	        $table->increments('id')->unique();
	        $table->integer('user_id')->unsigned();
            $table->string('title', 50);     //②文字型、string('カラム名', 数字)で文字数制限指定ができる。
            $table->string('body', 200);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('deleted_at', 0)->nullable();
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
        Schema::dropIfExists('posts');
    }
}
