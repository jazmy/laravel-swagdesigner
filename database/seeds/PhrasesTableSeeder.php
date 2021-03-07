<?php

use Illuminate\Database\Seeder;
use App\Phrase;

class PhrasesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $phrases = [
      [3,'Hello','My Name is',null, true, 'hello','8dmkyyjrqy4r6w7r.jpg' ],
      [3, 'This',null,null, true, 'thumbs','su97sxhzp8jpvzka.jpg'],
      [2,'Property of', null, null, false, 'property',''],
      [3,'Have no Fear',null,'is here', true, 'hero','z0bi99znove7iaer.jpg'],
      [2, null, 'Like a Boss', null, true, 'boss','h22soks4swo4b7u5.jpg'],
      [3,"Kiss me","it's my",null, true, 'kiss','otb9r0il765pn8o0.jpg'],
      [3,'Everyone Knows','a Douche Named',null, false, 'knows',''],
      [2,null,'All the Things!',null, true, 'allthethings','zts8ywckc1o2y74i.jpg'],
    ];
    $timestamp = Carbon\Carbon::now()->subDays(count($phrases));

    # Loop through each author, adding them to the database
    foreach($phrases as $phrase) {

      # Set the created_at/updated_at for each book to be one day less than
      # the book before. That way each book will have unique timestamps.
      $timestampForThisPhrase = $timestamp->addDay()->toDateTimeString();
      Phrase::insert([
        'created_at' => $timestampForThisPhrase,
        'updated_at' => $timestampForThisPhrase,
        'numlines' => $phrase[0],
        'line1' => $phrase[1],
        'line2' => $phrase[2],
        'line3' => $phrase[3],
        'enabled' => $phrase[4],
        'template' => $phrase[5],
        'p5jsimg' => $phrase[6]
      ]);
    }
  }
}
