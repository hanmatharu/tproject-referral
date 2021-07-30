<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Recipes;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;

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
    $recipes = Recipes::where('active', '1')->orderBy('created_at', 'desc')->paginate(5);
    //page heading
    $title = 'Latest Recipes';
    //return home.blade.php templae from resources/views folder
    return view('home')->withRecipes($recipes)->withTitle($title);
  }

  public function create(Request $request)
  {
    //
    if ($request->user()->can_post()) {
      return view('recipes.create');
    } else {
      return redirect('/')->withErrors('You have not sufficient permissions for writing post');
    }
  }

  public function store(PostFormRequest $request)
  {
    $post = new Recipes();
    $post->title = $request->get('title');
    $post->body = $request->get('body');
    $post->slug = Str::slug($post->title);

    $duplicate = Recipes::where('slug', $post->slug)->first();
    if ($duplicate) {
      return redirect('new-post')->withErrors('Title already exists.')->withInput();
    }

    $post->author_id = $request->user()->id;
    if ($request->has('save')) {
      $post->active = 0;
      $message = 'Recipe saved successfully';
    } else {
      $post->active = 1;
      $message = 'Recipe published successfully';
    }
    $post->save();
    return redirect('edit/' . $post->slug)->withMessage($message);
  }

  public function show($slug)
  {
    $post = Recipes::where('slug',$slug)->first();
    if(!$post)
    {
       return redirect('/')->withErrors('requested page not found');
    }

    return view('recipes.show')->withPost($post);
  }

  public function edit(Request $request,$slug)
  {
    $post = Recipes::where('slug',$slug)->first();
    if($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
      return view('recipes.edit')->with('post',$post);
    return redirect('/')->withErrors('you have not sufficient permissions');
  }

  public function update(Request $request)
  {
    //
    $post_id = $request->input('recipe_id');
    $post = Recipes::find($post_id);
    if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
      $title = $request->input('title');
      $slug = Str::slug($title);
      $duplicate = Recipes::where('slug', $slug)->first();
      if ($duplicate) {
        if ($duplicate->id != $post_id) {
          return redirect('edit/' . $post->slug)->withErrors('Title already exists.')->withInput();
        } else {
          $post->slug = $slug;
        }
      }

      $post->title = $title;
      $post->body = $request->input('body');

      if ($request->has('save')) {
        $post->active = 0;
        $message = 'Recipe saved successfully';
        $landing = 'edit/' . $post->slug;
      } else {
        $post->active = 1;
        $message = 'Recipe updated successfully';
        $landing = $post->slug;
      }
      $post->save();
      return redirect($landing)->withMessage($message);
    } else {
      return redirect('/')->withErrors('you have not sufficient permissions');
    }
  }

  public function destroy(Request $request, $id)
  {
    //
    $post = Recipes::find($id);
    if($post && ($post->author_id == $request->user()->id || $request->user()->is_admin()))
    {
      $post->delete();
      $data['message'] = 'Recipe deleted Successfully';
    }
    else
    {
      $data['errors'] = 'Invalid Operation. You do not have sufficient permissions';
    }
    return redirect('/')->with($data);
  }

}
