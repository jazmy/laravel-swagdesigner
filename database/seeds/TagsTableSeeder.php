<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $tags = ['meme', 'funny', 'hero', 'kiss', 'sticker', 'all the things', 'humor'];

    foreach($tags as $tagName) {
      $tag = new Tag();
      $tag->name = $tagName;
      $tag->save();
    }
  }
}
