<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Models\BlogPost;

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

Route::get('/','TemplateController@index');

Route::resource('blogs', 'BlogPostController');

Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, 'index']);
Route::get('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'show']); //shows stored recipe
Route::get('addrecipe', 'BlogPostController@addRecipe');
Route::get('home', 'BlogPostController@showHome');
Route::get('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'create']); //shows create recipe form
Route::post('Create', 'BlogPostController@store'); //saves the created recipe to the databse
Route::get('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'edit']); //shows edit recipe form
Route::put('/blog/{blogPost}/edit', 'BlogPostController@update'); //commits edited recipe to the database
Route::patch('/blog/{blogPost}/edit', 'BlogPostController@update');
Route::delete('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'destroy']); //deletes recipe from the database
Route::get('contact-us', 'ContactController@getContact');
Route::post('contact-us', 'ContactController@saveContact');

Route::post('/search', function(){
    $q = Request::get('q');
    if($q != "") {
        $posts = BlogPost::where('title', 'LIKE', '%' . $q . '%')
                            ->orWhere('body', 'LIKE', '%' . $q . '%')
                            ->get();
        if(count($posts) > 0)
            return view('search')->withDetails($posts)->withQuery($q);
    }
    return view('search')->withMessage("No Recipes Found!");
});
