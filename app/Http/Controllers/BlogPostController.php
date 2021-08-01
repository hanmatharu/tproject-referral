<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        // show all blog posts
        $posts = BlogPost::all(); //fetch all blog posts from DB
	    return $posts; //returns the fetched posts
    }

    public function create()
    {
        //show form to create a blog post
    }


    public function store(Request $request)
    {
        //store a new post
    }

    public function show(BlogPost $blogPost)
    {
        //show a blog post
    }


    public function edit(BlogPost $blogPost)
    {
        //show form to edit the post
    }


    public function update(Request $request, BlogPost $blogPost)
    {
        //save the edited post
    }


    public function destroy(BlogPost $blogPost)
    {
        //delete a post
    }
}
