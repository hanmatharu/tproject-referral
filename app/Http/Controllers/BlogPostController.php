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
	    return $posts; //returns the fetched posts
    }

    public function create()
    {
        //show form to create a recipe post
    }


    public function store(Request $request)
    {
        //store a new recipe
    }

    public function show(BlogPost $blogPost)
    {
        //show a recipe post
        return $blogPost; //returns the fetched posts
    }


    public function edit(BlogPost $blogPost)
    {
        //show form to edit the recipe
    }


    public function update(Request $request, BlogPost $blogPost)
    {
        //save the edited recipe
    }


    public function destroy(BlogPost $blogPost)
    {
        //delete a recipe
    }
}
