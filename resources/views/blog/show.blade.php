@extends('layouts.app')

@section('mytitle', 'Recipe')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <br> <br>
                <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
            </div>
                <p>{!! $post->body !!}</p>
                <div class="col-12 text-center pt-5">
                <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit Recipe</a>
                <br><br>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Recipe</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
