<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectIdeasAndPhrases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('ideas', function (Blueprint $table) {

        # Add a new INT field called `phrase_id` that has to be unsigned (i.e. positive)
        $table->integer('phrase_id')->unsigned();

        # This field `phrase_id` is a foreign key that connects to the `id` field in the `phrasess` table
        $table->foreign('phrase_id')->references('id')->on('phrases');


       });
    }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
  //     Schema::table('products', function (Blueprint $table) {

      # ref: http://laravel.com/docs/migrations#dropping-indexes
      # combine tablename + fk field name + the word "foreign"
      //Commenting out this section because in the migration we drop the tables so these columns don't exist by the time this runs
      //  $table->dropForeign('orders_product_id_foreign');
      //  $table->dropColumn('product_id');
//  });
     }
  }
