@extends('blog_theme/main')

@section('content')

    <div class="row justify-content-center mb-5">
        <h2>Create a new category: </h2>
    </div>

    @include('blog_theme/_partials/errors')

    <form action="/saveCategory" method="post">
        {{csrf_field()}}
        <div class="row d-flex justify-content-center">
        <div class="form-group col-md-5 d-flex align-items-center">
            <label for="category">Title:</label>
            <input type="text" class="form-control ml-2 mr-2" name="category" id="category" placeholder="Title of a category">
        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <button type="submit" name="submit" class="btn btn-secondary rounded col-md-2">Submit</button>
        </div>
        </div>
    </form>
@endsection
