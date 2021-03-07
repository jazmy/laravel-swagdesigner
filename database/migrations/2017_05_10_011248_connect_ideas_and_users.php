<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectIdeasAndUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('ideas', function (Blueprint $table) {

             # Add a new INT field called `user_id` that has to be unsigned (i.e. positive)
             $table->integer('user_id')->unsigned();

             # This field `user_id` is a foreign key that connects to the `id` field in the `authors` table
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
       Schema::table('ideas', function (Blueprint $table) {

           # ref: http://laravel.com/docs/5.1/migrations#dropping-indexes
           $table->dropForeign('ideas_user_id_foreign');

           $table->dropColumn('user_id');
       });
   }
}
