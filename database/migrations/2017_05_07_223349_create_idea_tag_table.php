<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeaTagTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('idea_tag', function (Blueprint $table) {

      $table->increments('id');
      $table->timestamps();

      # `idea_id` and `tag_id` will be foreign keys, so they have to be unsigned
      #  Note how the field names here correspond to the tables they will connect...
      # `idea_id` will reference the `ideas table` and `tag_id` will reference the `tags` table.
      $table->integer('idea_id')->unsigned();
      $table->integer('tag_id')->unsigned();

      # Make foreign keys
      $table->foreign('idea_id')->references('id')->on('ideas');
      $table->foreign('tag_id')->references('id')->on('tags');
    });
  }



  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::drop('idea_tag');
  }
}
