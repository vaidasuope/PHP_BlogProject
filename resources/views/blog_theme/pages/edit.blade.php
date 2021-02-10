@extends('blog_theme/main')

@section('content')
    <div class="row justify-content-center mb-5">
        <h2>Redaguoti įrašą</h2>

        @include('blog_theme/_partials/errors')
    </div>
    {{--    apsirasom butinai action - kur nukreips po paspaudimo ir jis turi buti aprasytas routes--}}
    @foreach($post as $p)
    <form action="/storeupdate/{{$p->id}}" method="post">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="title">Pavadinimas</label>
            <input type="text" value="{{$p->title}}" class="form-control" name="title" id="title"
                   placeholder="Įrašo pvadinimas">
        </div>
        <div class="form-group">
            <label for="category">Kategorija</label>
            <select class="form-control" id="category" name="category">
                <option value="" disabled selected>{{$p->category}}</option>
                @foreach($options as $option)
                    @if($option->category!=$p->category)
                    <option value={{$option->id}}>{{$option->category}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="content">Jūsų įrašas:</label>
            <textarea class="form-control" id="content" name="body" rows="5">{{$p->body}}</textarea>
        </div>
        <div class="form-group">
            <label for="upload">Pasirinkti paveikslėlį:</label>
            <input type="file" class="form-control" id="upload">
        </div>
        <div class="form-group d-flex justify-content-center m-5">
            <button type="submit" name="submit" class="btn btn-secondary rounded">Saugoti</button>
        </div>
    </form>
    @endforeach

@endsection
