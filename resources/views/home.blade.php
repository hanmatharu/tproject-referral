@extends('FrontEnd.master')

<!--@section('recent')
    <section class="top-recipe spad">

        <div class="container po-relative">
            <div class="plus-icon">
                <i class="fa fa-plus"></i>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="top-recipe-item large-item">
                        <div class="top-recipe-img set-bg" data-setbg="img/top-recipe/recipe-1.jpg">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="top-recipe-text">
                            <div class="cat-name">Desert</div>
                            <a href="#">
                                <h4>One Pot Weeknight Lasagna Soup Recipe</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit, sed do eiusmod tempor incididunt ut labore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="top-recipe-item">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="top-recipe-img set-bg" data-setbg="img/top-recipe/recipe-2.jpg">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="top-recipe-text">
                                    <div class="cat-name">Vegan</div>
                                    <a href="#">
                                        <h4>One Pot Weeknight Lasagna Soup Recipe</h4>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-recipe-item">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="top-recipe-img set-bg" data-setbg="img/top-recipe/recipe-3.jpg">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="top-recipe-text">
                                    <div class="cat-name">Meat lover</div>
                                    <a href="#">
                                        <h4>Veggie soup with Mushrooms</h4>
                                    </a>
                                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Lorem ipsum dolor sit amet, consectetur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-recipe-item">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="top-recipe-img set-bg" data-setbg="img/top-recipe/recipe-4.jpg">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="top-recipe-text">
                                    <div class="cat-name">Desert</div>
                                    <a href="#">
                                        <h4>Caramel Ice Cream with Berries</h4>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-recipe-item">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="top-recipe-img set-bg" data-setbg="img/top-recipe/recipe-5.jpg">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="top-recipe-text">
                                    <div class="cat-name">Desert</div>
                                    <a href="#">
                                        <h4>Freash Octopuse with lime juice</h4>
                                    </a>
                                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Lorem ipsum dolor sit amet, consectetur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
-->

@extends('layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')
@if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<div class="">
  @foreach( $posts as $post )
  <div class="list-group">
    <div class="list-group-item">
      <h3><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a>
        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
          @if($post->active == '1')
          <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
          @else
          <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Draft</a></button>
          @endif
        @endif
      </h3>
      <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
    </div>
    <div class="list-group-item">
      <article>
        {!! Str::limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}
      </article>
    </div>
  </div>
  @endforeach
  {!! $posts->render() !!}
</div>
@endif
@endsection
