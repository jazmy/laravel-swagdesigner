<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public function ideas() {
  return $this->belongsToMany('App\Idea')->withTimestamps();
}

public static function getTagsForCheckboxes() {

    $tags = Tag::orderBy('name','ASC')->get();

    $tagsForCheckboxes = [];

    foreach($tags as $tag) {
        $tagsForCheckboxes[$tag['id']] = $tag->name;
    }

    return $tagsForCheckboxes;

}


}
