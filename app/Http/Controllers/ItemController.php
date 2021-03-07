<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item; #Item Model

class ItemController extends Controller
{
    //

    function practiceX() {
      $items = Item::all();
      dump($items->toArray());
}


}
