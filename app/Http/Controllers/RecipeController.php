<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    // fetch 5 posts from database which are active and latest
    $posts = Posts::where('active', '1')->orderBy('created_at', 'desc')->paginate(5);
    //page heading
    $title = 'Latest Posts';
    //return home.blade.php templae from resources/views folder
    return view('home')->withRecipes($posts)->withTitle($title);
  }
}
