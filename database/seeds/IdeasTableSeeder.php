<?php

use Illuminate\Database\Seeder;
use App\Idea;

class IdeasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       //Populating these columns: line1, line2, line3, enabled, votes, phrase_id, template
       $ideas = [
        ['Hello','My name is','Slim Shady', true,25,1, 'hello', 1, 'nf9t19xbirqy1bq7.jpg'],
        ['This Girl','Loves','Cookie Dough', true,4,2, 'thumbs', 1,'9qp9ht3zb4rkl3g5.jpg'],
        ['Property of','Your Mom',null, false,43,3, 'property', 1,''],
        ['Have no Fear','Tech Support','is here', true,21,4, 'hero', 1,'ivu7y4mcjsq4pkz9.jpg'],
        ['Finished my Homework', 'Like a Boss', null, true,7,5, 'boss', 1,'jyi3tg4a273acs9o.jpg'],
        ["Kiss me","it's my","Birthday", true,5,6, 'kiss', 1,'vw9c9qmxdugqotjv.jpg'],
        ['Everyone Knows','a Douche Named','Mike', false,66,7, 'knows', 1,''],
        ['I Use','All the Forks', null, true,34,8, 'allthethings', 1,'cuqh1y5r1pngz9jf.jpg'],
        ['Hello','My name is','Santa Claus', true,8,1, 'hello', 2,'8o1ud2i326e7p621.jpg'],
        ['This Guy','Loves','Camaros', true,33,2, 'thumbs', 2,'q68vonyuq6tc84sf.jpg'],
        ['Property of','My Girlfriend', null, false,76,3, 'property', 2,''],
        ['Have no Fear','Your Bestie','is here', true,33,4, 'hero', 2,'9v8m6xfxqpqergbj.jpg'],
        ['Paid my Taxes', 'Like a Boss', null, true,5,5, 'boss', 2,'t7yjjz56t2i27rhu.jpg'],
        ["Kiss me","it's my","Bachelor Party", true,76,6, 'kiss', 2,'vnpquem52wzho7w6.jpg'],
        ['Everyone Knows','a Douche Named','Paul', false,27,7, 'knows', 2,''],
        ['I Waste','All the Paper Towels', null, true,12,8, 'allthethings', 2,'et6or865v8jplnr.jpg'],
        ['Buy Me','All the Drinks', null, true,12,8, 'allthethings', 2,'n6gs7i3vg9rezd15.jpg'],
    ];
         $timestamp = Carbon\Carbon::now()->subDays(count($ideas));

         # Loop through each author, adding them to the database
        foreach($ideas as $idea) {

            # Set the created_at/updated_at for each book to be one day less than
            # the book before. That way each book will have unique timestamps.
            $timestampForThisIdea = $timestamp->addDay()->toDateTimeString();
            idea::insert([
                'created_at' => $timestampForThisIdea,
                'updated_at' => $timestampForThisIdea,
                'line1' => $idea[0],
                'line2' => $idea[1],
                'line3' => $idea[2],
                'enabled' => $idea[3],
                'votes' => $idea[4],
                'phrase_id' => $idea[5],
                'template' => $idea[6],
                'user_id' => $idea[7],
                'p5jsimg' => $idea[8],
            ]);
        }
    }
 }
