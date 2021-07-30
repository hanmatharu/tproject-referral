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
    $posts = Posts::where('active', '1')->orderBy('created_at', 'desc')->paginate(5);
    $title = 'Latest Posts';
    return view('home')->withRecipes($posts)->withTitle($title);
  }

}
