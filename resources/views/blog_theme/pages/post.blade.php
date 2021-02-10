@extends('blog_theme/main')

@section('content')
    <div class="row">
        <div class="col-md">
            <h2>{{$post->title}}</h2>
            <p>{{$post->body}}</p>
            <a onclick="return confirm('Are you really want to delete it?')"
               href="/delete/{{$post->id}}" class="float-right btn btn-danger rounded">Delete</a>
            <a href="/edit/{{$post->id}}" class="float-right btn btn-dark rounded mr-2">Edit</a>
        </div>

    </div>
@endsection
