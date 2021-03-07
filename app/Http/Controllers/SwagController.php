<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Phrase;
use App\Idea;
use App\Tag;
use App\User;
use Session;
use Image;
use Intervention\Image\ImageManager;

class SwagController extends Controller
{
  //----------------------------------------------------------------------
  //   HomePage
  //----------------------------------------------------------------------
  public function index(Request $request) {
    $phrase = Phrase::where('enabled', '=', '1')->get();
    $user = $request->user();
    if($user) {

      $ideas = $user->ideas()->where('enabled', '=', '1')->orderBy('id')->get();
    }
    else {
      $ideas = [];
    }
    return view('pages.swag')->with(['phrases' => $phrase]);
  }

  //----------------------------------------------------------------------
  //
  //   CRUD Phrases Functions
  //
  //----------------------------------------------------------------------
  public function phrases() {
    $phrase = Phrase::where('enabled', '=', '1')->get();
    return view('pages.phrases')->with(['phrases' => $phrase]);
  }

  public function editphrase($id) {
    $phrase = Phrase::find($id);

    if(is_null($phrase)) {
      Session::flash('message', 'The phrase you requested was not found.');
      return redirect('/phrases');
    }

    return view('pages.phraseedit')->with(['phrase' => $phrase]);
  }

  public function savePhraseEdit(Request $request) {

    $phrase = Idea::find($request->id);
    # Edit idea in the database
    $phrase->line1 = $request->line1;
    $phrase->line2 = $request->line2;
    $phrase->line3 = $request->line3;
    $phrase->template = $request->template;

    $phrase->save();
    Session::flash('message', 'Your changes to '. $phrase->line1 . ' ' . $phrase->line2 . ' ' . $phrase->line3 .  ' were saved.');
    return redirect('/phrases');

  }

  //----------------------------------------------------------------------
  //
  //   CRUD Ideas Functions
  //
  //----------------------------------------------------------------------

  //Show List of all Ideas
  public function ideas(Request $request) {
    $user = $request->user();


    if($user) {
      # Approach 1)
      //$books = Book::where('user_id', '=', $user->id)->orderBy('title')->get();

      # Approach 2) Take advantage of Model relationships
      $ideas = $user->ideas()->where('enabled', '=', '1')->orderBy('id')->get();
    }
    else {
      $ideas = [];
    }

    //  $ideas = Idea::where('enabled', '=', '1')->get();
    return view('pages.ideas')->with(['ideas' => $ideas]);
  }


  //Show Add New Idea Form - When you create a new idea, it is a new version of a phrase.
  public function newIdea($id) {
    $phrase = Phrase::find($id);
    $ideas = Idea::find($id);
    if(is_null($phrase)) {
      Session::flash('message', 'The phrase you requested was not found.');
      return redirect('/phrases');
    }

    # Get all the possible tags so we can include them with checkboxes in the view
    $tagsForCheckboxes = Tag::getTagsForCheckboxes();

    $tagsForThisIdea = [];

    return view('pages.ideanew') ->with([
      'phrase' => $phrase,
      'tagsForCheckboxes' => $tagsForCheckboxes,
      'tagsForThisIdea' => $tagsForThisIdea,
    ]);
  }

  //Action to Save the Edits from the New Idea Form to the Database
  public function newIdeaAction(Request $request) {
    # Add new Idea to database

    //Check to see how many lines the phrase should be
    $phrase = Phrase::find($request->phrase_id);

    $this->validate($request, [
      'line1' => 'required|min:1',
    ]);

    $idea = new Idea();
    $idea->phrase_id = $request->phrase_id;
    $idea->line1 = $request->line1;
    $idea->line2 = $request->line2;
    $idea->template = $request->template;
    $idea->p5jsimg = $request->p5jsimg;

    if ($phrase->numlines > 2) {
      $idea->line3 = $request->line3;
    } else {
      $idea->line3 = null;
    }

    $idea->user_id = $request->user()->id;
    $idea->save();
    Session::flash('message', 'The Phrase "'. $request->line1 . " " . $request->line2 . " " . $request->line3 . '" was added.');

    # If there were tags selected...
    if($request->tags) {
      $tags = $request->tags;
    }
    # If there were no tags selected (i.e. no tags in the request)
    # default to an empty array of tags
    else {
      $tags = [];
    }
    # Sync tags
    $idea->tags()->sync($tags);
    $idea->save();
    return redirect('/ideas');
  }

  //Show Edit Idea Form
  public function editIdea($id) {

    $ideas = Idea::find($id);

    if(is_null($ideas)) {
      Session::flash('message', 'The idea you requested was not found.');
      return redirect('/ideas');
    }

    # Get all the possible tags so we can include them with checkboxes in the view
    $tagsForCheckboxes = Tag::getTagsForCheckboxes();

    $tagsForThisIdea = [];
    foreach($ideas->tags as $tag) {
      $tagsForThisIdea[] = $tag->name;
    }

    return view('pages.ideaedit') ->with([
      'idea' => $ideas,
      'tagsForCheckboxes' => $tagsForCheckboxes,
      'tagsForThisIdea' => $tagsForThisIdea,
    ]);
  }

  //Action to Save the New Idea to the Database
  public function editIdeaAction(Request $request) {

    $this->validate($request, [
      'id' => 'required|numeric|min:1',
      'line1' => 'required|min:1',
      'line2' => 'required|min:1'
    ]);

    $idea = Idea::find($request->id);
    $idea->line1 = $request->line1;
    $idea->line2 = $request->line2;
    $idea->line3 = $request->line3;
    $idea->p5jsimg = $request->p5jsimg;
    $idea->save();

    # If there were tags selected...
    if($request->tags) {
      $tags = $request->tags;
    }
    # If there were no tags selected (i.e. no tags in the request)
    # default to an empty array of tags
    else {
      $tags = [];
    }
    # Sync tags
    $idea->tags()->sync($tags);
    $idea->save();

    Session::flash('message', 'Your changes to "'. $idea->line1 . " " . $idea->line2 . " " . $idea->line3 .  '" were saved.');
    return redirect('/ideas');
  }

  public function deleteIdeaConfirm($id) {
    # Get the idea they're attempting to delete
    $idea = Idea::find($id);
    if(!$idea) {
      Session::flash('message', 'Deletion failed; Idea not found.');
      return redirect('/ideas');
    }
    return view('pages.ideadelete')->with(['idea' => $idea]);
  }

  //Action to Save the New Idea to the Database
  public function deleteIdeaAction(Request $request) {
    $idea = Idea::find($request->id);
    if(!$idea) {
      Session::flash('message', 'Deletion failed; Idea not found.');
      return redirect('/ideas');
    }
    # Remove any tag associations with this idea
    $idea->tags()->detach();
    if (  $idea->p5jsimg != '') {
      $p5jsimg = $idea->p5jsimg;
    } else {
      $p5jsimg = "none.jpg";
    }
    $filepath = "img\items\\";
    if (file_exists($filepath . "thumb_" . $p5jsimg)) {
      unlink($filepath . "thumb_" . $p5jsimg);
    }
    if (file_exists($filepath . $p5jsimg)) {
      unlink($filepath . $p5jsimg);
    }

    $idea->delete();
    Session::flash('message', '"' . $idea->line1 . " " . $idea->line2 . " " . $idea->line3 .  '" was deleted.');
    return redirect('/ideas');
  }

  //----------------------------------------------------------------------
//
//   Save Image
//   Route (/saveimage)
//----------------------------------------------------------------------

public function saveImage(Request $request) {


  $canvas = $request->canvasData;
  $filename = $request->filename;
  $canvas = substr($canvas,strpos($canvas,",")+1);
  $canvas = base64_decode($canvas);
  $filepath = 'img\items\\' . $filename;
  file_put_contents($filepath, $canvas);

//$img = Image::make($filepath)->resize(300, 200);
//$img = Image::make(file_get_contents($filepath));

//Image::make($filepath)->resize(300, 300)->save( public_path('/default_resize.jpg') );

// open an image file
$img = Image::make($filepath);
$img->resize(200, 200);
$img->save('img\items\thumb_' . $filename);

// save image in desired format
//$img->save('jaz01.jpg');



//Intervention Image is an open source PHP image handling and manipulation library.
//http://image.intervention.io/
//$p5jsimg = Image::make('img/items/ay355j9yrgehg9zz.jpg');
// now you are able to resize the instance
//$img->resize(240, 240);
// finally we save the image as a new file
//$img->save('img\items\thumb_' . $filename);

/*

  $img = $request->canvasData;
  $img = str_replace('data:image/png;base64,', '', $img);
  $img = str_replace(' ', '+', $img);
  $fileData = base64_decode($img);
  //saving
  $fileName = '/img/items/' . 'photo.png';
  $fileData->move('/img/items/', 'photo.png');
  //file_put_contents($fileName, $fileData);
*/


}

}
