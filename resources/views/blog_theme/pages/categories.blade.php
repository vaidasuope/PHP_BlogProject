@extends('blog_theme/main')

@section('content')
    <table class="table text-center">
        <thead class="thead-light">
        <tr class="rounded">
            <th scope="col">Category</th>
            <th scope="col">#</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <td><a name="linkas" href="/oneCategory/{{$category->id}}">{{$category->category}}</a></td>
            <td><a onclick="return confirm('Are you really want to delete it?')" href="/del/{{$category->id}}">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <p id="notice" class="font-italic m-0 mb-2">Couldn't find the needed category? <a href="/add-category">Click here</a></p>
    </div>



{{--    @if(count($items)>0)--}}
{{--        <div>--}}
{{--            @foreach($items as $item)--}}
{{--                <ul>--}}
{{--                    <li>{{$item->id}}</li>--}}
{{--                    <li>{{$item->title}}</li>--}}
{{--                </ul>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    @endif--}}

@endsection
