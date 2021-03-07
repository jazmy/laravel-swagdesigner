<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
  public function tags()
  {
    # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
    return $this->belongsToMany('App\Tag')->withTimestamps();
  }
  public function phrase() {
    # Ideas belongs to Phrase
    # Define an inverse one-to-many relationship.
    return $this->belongsTo('App\Phrase');
  }
  public function user() {
    return $this->belongsTo('App\User');
  }
}
