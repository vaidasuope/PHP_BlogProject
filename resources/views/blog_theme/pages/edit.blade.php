@extends('blog_theme/main')

@section('content')
    <div class="row justify-content-center mb-5">
        <h2>Edit your post</h2>

        @include('blog_theme/_partials/errors')
    </div>
    {{--    apsirasom butinai action - kur nukreips po paspaudimo ir jis turi buti aprasytas routes--}}
    @foreach($post as $p)
    <form action="/storeupdate/{{$p->id}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{$p->title}}" class="form-control" name="title" id="title"
                   placeholder="Post title">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <p id="notice" class="font-italic m-0 mb-2">Couldn't find the needed category? <a href="/add-category">Click here</a></p>
            <select class="form-control" id="category" name="category_id">
                <option value="" disabled selected>{{$p->category}}</option>
                @foreach($options as $option)
                    @if($option->category!=$p->category)
                    <option value={{$option->id}}>{{$option->category}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="content">Your post:</label>
            <textarea class="form-control" id="content" name="body" rows="5">{{$p->body}}</textarea>
        </div>
        <div class="form-group">
            <label for="upload">Add an image:</label>
            <p><img src="/{{$p->img}}"></p>
            <input type="file" class="form-control" id="upload" name="img" value="{{$p->img}}">
        </div>
        <div class="form-group d-flex justify-content-center m-5">
            <button type="submit" name="submit" class="btn btn-secondary rounded">Submit</button>
            <a href="/post/{{$p->id}}" class="btn btn-secondary ml-2 rounded">Cancel</a>
        </div>
    </form>
    @endforeach

@endsection
