@extends('blog_theme/main')

@section('content')

    <div class="row justify-content-center mb-5">
        <h2>Create a new category: </h2>
    </div>

    @include('blog_theme/_partials/errors')

    <form action="/saveCategory" method="post" class="d-flex justify-content-center align-items-center">
        {{csrf_field()}}
        <div class="form-group d-flex align-items-center">
            <label for="category">Title:</label>
            <input type="text" class="form-control ml-2 mr-2" name="category" id="category" placeholder="Title of a category">
        </div>
            <button type="submit" name="submit" class="btn btn-secondary rounded">Submit</button>
    </form>
@endsection
