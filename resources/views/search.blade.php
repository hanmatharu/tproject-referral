@extends('layouts.app')

@section('mytitle', 'Search Results')

@section('content')
<div class = container>
    @if(isset($details))
    <div class = container>
        <h1> The Search results for <b> {{ $query }} </b> are :</h2>
        <br>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Ingredients</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $posts)
                        <tr>
                            <td> {{ $posts->title }} </td>
                            <td> {{ $posts->body }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    @elseif(isset($message))
    <h1> {{ $message }} </h1>
    <br> <br>
    @endif
</div>
@endsection
