<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/','TemplateController@index');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', 'RecipeController@index');
Route::get('/home', ['as' => 'home', 'uses' => 'RecipeController@index']);

//authentication
// Route::resource('auth', 'Auth\AuthController');
// Route::resource('password', 'Auth\PasswordController');
Route::get('/logout', 'UserController@logout');

Route::group(['prefix' => 'auth'], function ()
{
  Auth::routes();
});

// check for logged in user
Route::middleware(['auth'])->group(function ()
{
  // show new post form
  Route::get('new-recipe', 'RecipeController@create');
  // save new post
  Route::post('new-recipe', 'RecipeController@store');
  // edit post form
  Route::get('edit/{slug}', 'RecipeController@edit');
  // update post
  Route::post('update', 'RecipeController@update');
  // delete post
  Route::get('delete/{id}', 'RecipeController@destroy');
  // display user's all recipes
  Route::get('my-all-recipes', 'UserController@user_recipes_all');
  // display user's drafts
  Route::get('my-drafts', 'UserController@user_recipes_draft');
});

//users profile
Route::get('user/{id}', 'UserController@profile')->where('id', '[0-9]+');
// display list of posts
Route::get('user/{id}/recipes', 'UserController@user_recipes')->where('id', '[0-9]+');
// display single post
Route::get('/{slug}', ['as' => 'post', 'uses' => 'RecipeController@show'])->where('slug', '[A-Za-z0-9-_]+');
