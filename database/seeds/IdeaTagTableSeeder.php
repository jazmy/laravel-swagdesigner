<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Idea;

class IdeaTagTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {

    # First, create an array of all the ideas we want to associate tags with
    # The *key* will be the idea title, and the *value* will be an array of tags.
    # Note: purposefully omitting the Harry Potter ideas to demonstrate untagged ideas
    $ideas =[
      '1' => ['meme', 'funny', 'hero', 'kiss'],
      '2' => ['meme', 'funny', 'hero', 'kiss', 'sticker', 'all the things', 'humor'],
      '3' => ['meme', 'funny', 'hero', 'kiss', 'sticker', 'all the things', 'humor'],
      '4' => ['meme', 'funny', 'hero', 'kiss'],
      '5' => ['meme', 'sticker', 'all the things', 'humor'],
      '6' => ['meme',  'sticker', 'all the things', 'humor'],
      '7' => ['meme', 'funny', 'hero', 'kiss'],
      '8' => ['meme', 'funny', 'all the things', 'humor'],
      '9' => ['meme', 'funny', 'all the things', 'humor'],
    ];


    # Now loop through the above array, creating a new pivot for each idea to tag
    foreach($ideas as $id => $tags) {

      # First get the idea
      $idea = Idea::find($id);

      # Now loop through each tag for this idea, adding the pivot
      foreach($tags as $tagName) {
        $tag = Tag::where('name','LIKE',$tagName)->first();

        # Connect this tag to this idea
        $idea->tags()->save($tag);
      }

    }
  }

}
