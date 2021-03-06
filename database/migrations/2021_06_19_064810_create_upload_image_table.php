<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUploadImageTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('upload_image', function (Blueprint $table) {
	      $table->increments('id')->unique();
			$table->string("file_name");
			$table->string("file_path");
			$table->integer("post_id")->unsigned();
			$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
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
       Schema::dropIfExists('upload_image');
   }
}