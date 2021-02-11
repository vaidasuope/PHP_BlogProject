@extends('blog_theme/main')

@section('content')
    <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($posts as $post)
            <div class="post-preview">
                <a href="post/{{$post->id}}">
                    <h2 class="post-title">{{$post->title}}</h2>
                    <h3 class="post-subtitle">
                        {{Str::limit($post->body, 250, '...')}}
                    </h3>
                </a>
                <a href="post/{{$post->id}}" class="float-right btn btn-success text-light rounded">Read more</a>
                <br/>
{{--                    <a href="/edit/{{$post->id}}">Edit</a>--}}
{{--                    <a onclick="return confirm('Are you really want to delete it?')"--}}
{{--                       href="/delete/{{$post->id}}">Delete</a>--}}
                <p class="post-meta">Posted by
                    <a href="#">{{$post->name}}</a>
                    on {{$post->created_at}}. Category: <a name="linkas" href="/oneCategory/{{$post->category_id}}">{{$post->category}}.</a></p>
            </div>
            <hr>
    @endforeach
    <!-- Pager -->
        <div class="clearfix">
            {{$posts->links()}}
        </div>
    </div>
    </div>
@endsection
