@extends('blog_theme/main')

@section('content')
    <div>
        @foreach($items as $item)
            <div class="post-preview">
                <a href="post/{{$item->id}}">
                    <h2 class="post-title">{{$item->title}}</h2>
                    <h3 class="post-subtitle">
                        {{Str::limit($item->body, 250, '...')}}
                    </h3>
                </a>
                <a href="/post/{{$item->id}}" class="float-right btn btn-success text-light rounded">Read more</a>
                <br/>
                <p class="post-meta">Posted by
                    <a href="#">{{$item->name}}</a>
                    {{$item->created_at}}. Category: {{$item->category}}.</p>

                @endforeach
                {{--                Pagination cia turim uzdeti--}}
                <div class="clearfix">
                    {{$items->links()}}
                </div>
            </div>
    </div>
@endsection
