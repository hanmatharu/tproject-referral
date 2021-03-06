@extends('layouts.app')

@section('mytitle', 'All Recipes')

@section('content')
    <div class="container">
        <div class="row">
        <div class="container">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Recipes Blog!</h1>
                        <p>Enjoy reading our recipes. Click on a Recipe to read!</p>
                        <br>
                    </div>
                </div>
                @forelse($posts as $post)
                    <ul>
                        <li><a href="./blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li>
                    </ul>
                @empty
                    <p class="text-warning">No recipe Posts available</p>
                @endforelse
                <br>
            </div>
        </div>
        </div>
    </div>
@endsection
