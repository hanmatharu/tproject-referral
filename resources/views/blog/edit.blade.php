@extends('layouts.app')

@section('mytitle', 'Edit Recipe')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Edit Recipe</h1>
                    <p>Edit and submit this form to update a recipe</p>

                    <hr>

                    <form action="/blog/{{$post->id}}/edit" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="control-gr[oup col-12">
                                <label for="title">Recipe Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Post Title" value="{{ $post->title }}" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Ingredients Required</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Ingredients"
                                          rows="5" required>{{ $post->body }}</textarea>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Cooking Time</label>
                                <input type="integer" id="cook_time" class="form-control" name="cook_time" placeholder="Enter Post Body"
                                          value="{{ $post->cook_time }}" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Update Recipe
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
