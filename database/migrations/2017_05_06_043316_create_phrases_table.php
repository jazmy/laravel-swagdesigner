<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhrasesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('phrases', function (Blueprint $table) {
      # Increments method will make a Primary, Auto-Incrementing field.
      # Most tables start off this way
      $table->increments('id');

      # This generates two columns: `created_at` and `updated_at` to
      # keep track of changes to a row
      $table->timestamps();

      # The rest of the fields...
      $table->integer('numlines');
      $table->string('line1')->nullable();
      $table->string('line2')->nullable();
      $table->string('line3')->nullable();
      $table->string('template')->nullable();

      //For reference https://laravel.com/docs/4.2/schema
      $table->boolean('enabled')->default(false);
      $table->string('p5jsimg')->nullable();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::drop('phrases');
  }
}
