@extends('blog_theme/main')

@section('content')
    <div class="row justify-content-center mb-5">
        <h2>Naujas įrašas</h2>

        @include('blog_theme/_partials/errors')
    </div>
{{--    apsirasom butinai action - kur nukreips po paspaudimo--}}
    <form action="/store" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Pavadinimas</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Įrašo pvadinimas">
        </div>
        <div class="form-group">
            <label for="category">Kategorija</label>
            <select class="form-control" id="category" name="category">
                <option value="" disabled selected>Pasirinkite kategoriją</option>
                @foreach($options as $option)
                    <option value={{$option}}>{{$option}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="content">Jūsų įrašas:</label>
            <textarea class="form-control" id="content" name="body" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="upload">Pasirinkti paveikslėlį:</label>
            <input type="file" class="form-control" id="upload">
        </div>
        <div class="form-group d-flex justify-content-center m-5">
            <button type="submit" name="submit" class="btn btn-secondary rounded">Paskelbti</button>
        </div>
    </form>

@endsection
