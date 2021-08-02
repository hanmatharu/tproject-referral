@extends('layouts.app')

@section('mytitle', 'Create Recipe')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
            <div class="control-group col-12 text-center">
                <a href="/blog" class="btn btn-outline-primary btn-sm">View all Recipes</a>
            </div>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Create a New Recipe</h1>
                    <p>Fill and submit this form to create a recipe</p>

                    <hr>

                    <form action="Create" method="POST">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Recipe Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Post Title" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Recipe Body</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body"
                                          rows="" required></textarea>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Create Recipe
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

