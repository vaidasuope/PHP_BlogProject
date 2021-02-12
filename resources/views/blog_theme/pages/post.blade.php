@extends('blog_theme/main')

@section('content')

    @if(session()->has('message'))
        <div class="alert {{session('alert') ?? 'alert-info'}}">
            {{ session('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md">
            <h2>{{$post->title}}</h2>
            <img src="/{{$post->img}}" alt="No photo is shown" style="height: 250px" align="right">
            <p>{{$post->body}}</p>
            @if(Auth::check())
                <a onclick="return confirm('Are you really want to delete it?')"
                   href="/delete/{{$post->id}}" class="float-right btn btn-danger rounded">Delete</a>
                <a href="/edit/{{$post->id}}" class="float-right btn btn-dark rounded mr-2">Edit</a>
            @endif
        </div>

    </div>
@endsection
