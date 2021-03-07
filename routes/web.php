<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//----------------------------------------------------------------------
//   HomePage
//----------------------------------------------------------------------
Route::get('/', 'SwagController@index');


//----------------------------------------------------------------------
//   Phrases
//----------------------------------------------------------------------

//Show List of all Phrases
Route::get('/phrases', 'SwagController@phrases');


//----------------------------------------------------------------------
//   Ideas
//----------------------------------------------------------------------

Route::group(['middleware' => 'auth'], function () {
  //Show List of all Ideas
  Route::get('/ideas', 'SwagController@ideas');
  //Show Edit Idea Form
  Route::get('/idea/edit/{id}', 'SwagController@editIdea');
  //Action to Save the Edits from the Form
  Route::post('/idea/edit', 'SwagController@editIdeaAction');
  //Show Add New Idea Form
  Route::get('/idea/new/{id}', 'SwagController@newIdea');
  //Action to Save the New Idea
  Route::post('/idea/new', 'SwagController@newIdeaAction');
  //Confirm Deletion
  Route::get('/idea/delete/{id}', 'SwagController@deleteIdeaConfirm');
  //Action to Delete an Idea
  Route::post('/idea/delete', 'SwagController@deleteIdeaAction');

  //----------------------------------------------------------------------
  //   Save Canvas Image
  //----------------------------------------------------------------------
  Route::post('/saveImage', 'SwagController@saveImage');


});


Auth::routes();

Route::get('/home', 'SwagController@ideas')->name('home');
