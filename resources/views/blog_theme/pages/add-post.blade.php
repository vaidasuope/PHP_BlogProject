@extends('blog_theme/main')

@section('content')
    <div class="row justify-content-center mb-5">
        <h2>Create a New Post</h2>
    </div>
    <div class="row">
        @include('blog_theme/_partials/errors')
    </div>
{{--    apsirasom butinai action - kur nukreips po paspaudimo ir jis turi buti aprasytas routes--}}
    <form action="/store" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Post title">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <p id="notice" class="font-italic m-0 mb-2">Couldn't find the needed category? <a href="/add-category">Click here</a></p>
            <select class="form-control" id="category" name="category">
                <option value="" disabled selected>--Choose category--</option>
                @foreach($options as $option)
                    <option value={{$option->id}}>{{$option->category}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="content">Your thoughts:</label>
            <textarea class="form-control" id="content" name="body" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="upload">Add an image:</label>
            <input type="file" class="form-control" id="upload" name="img">
        </div>
        <div class="form-group d-flex justify-content-center m-5">
            <button type="submit" name="submit" class="btn btn-secondary rounded">Publish</button>
        </div>
    </form>

@endsection
