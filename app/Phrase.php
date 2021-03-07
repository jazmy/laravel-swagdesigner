<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
  public function ideas() {
  # Phrase has many Ideas
  # Define a one-to-many relationship.
  return $this->hasMany('App\Idea');
}
}
