<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        // show all recipe posts
        $posts = BlogPost::all(); //fetch all blog posts from DB
	    return view('blog.index', [
            'posts' => $posts,
        ]); //returns the view with posts
    }

    public function showHome()
    {
        return view('welcome');
    }

    public function create()
    {
        //show form to create a recipe post
        return view('blog.create');
    }


    public function store(Request $request)
    {
        //store a new recipe
        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'cook_time' => $request->cook_time,
            'user_id' => 1
        ]);

        return redirect('blog/' . $newPost->id);
    }

    public function addRecipe(){
        return view('blog.create');
    }

    public function show(BlogPost $blogPost)
    {
        //show a recipe post
        return view('blog.show', [
            'post' => $blogPost,
        ]); //returns the view with the post
    }


    public function edit(BlogPost $blogPost)
    {
        //show form to edit the recipe
        return view('blog.edit', [
            'post' => $blogPost,
            ]);
    }


    public function update(Request $request, BlogPost $blogPost)
    {
        //save the edited recipe
        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body,
            'cook_time' => $request->cook_time
        ]);

        return redirect('blog/' . $blogPost->id);
    }


    public function destroy(BlogPost $blogPost)
    {
        //delete a recipe
        $blogPost->delete();

        return redirect('/blog');

    }
}
