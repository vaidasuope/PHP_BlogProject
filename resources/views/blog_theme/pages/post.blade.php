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

    <div class="row mb-5">
            @foreach($post->comments as $comment)
                <div class="col-md-12 mt-2 mb-2"><strong>{{$comment->created_at}}</strong> {{$comment->body}}</div>
            @endforeach
    </div>

    @if(Auth::check())
    <form action="/addComment" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
{{--        <div class="form-group">--}}
{{--            <label for="exampleFormControlInput1">Email address</label>--}}
{{--            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">--}}
{{--        </div>--}}
        <div class="form-group">
            <input type="text justify-content-center" name="post_id" value="{{$post->id}}" hidden>
            <label for="body" class="font-weight-bold">Your Comment:</label>
            <textarea class="form-control" id="body" name="body" rows="3"></textarea>
        </div>
        <div class="form-group d-flex justify-content-center">
            <button class="btn btn-dark rounded">Add comment</button>
        </div>
    </form>
    @endif
@endsection
