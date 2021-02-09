@extends('blog_theme/main')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($posts as $post)
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">{{$post['title']}}</h2>
                        <h3 class="post-subtitle">
                            {{Str::limit($post->body, 250, '...')}}
{{--                            {{ substr($post->body, 0,  250) }}--}}
                        </h3>
                    </a>
                    <a href="post/{{$post->id}}">Skaityti daugiau</a>
                    <p class="post-meta">Category: {{$post['category']}}. Posted by
                        <a href="#">Start Bootstrap</a>
                        {{$post['created_at']}}</p>
                </div>
                <hr>
        @endforeach
        <!-- Pager -->
            <div class="clearfix">
                {{$posts->links()}}
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
@endsection
