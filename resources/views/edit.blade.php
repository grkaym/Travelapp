@extends('layouts.l-app')
@section('title', 'edit')
@section('main')
    <p>this page is edit page. post ID = {{$post->id}}</p>
    {{-- コンポーネントを使ってヘッド部分を表示する --}}
    @component('components.post')
        @slot('post_id')
            {{$post->id}}
        @endslot

        @slot('post_title')
            {{$post->name}}
        @endslot

        @slot('post_user')
            {{$post_user}}
        @endslot
        
        @slot('post_tag')
            @foreach ($tags as $tag)
                {{$tag->name}}
            @endforeach
        @endslot

        @slot('post_desc')
            {{$post->description}}
        @endslot

        @slot('post_edit')
            
        @endslot
    @endcomponent

    <button>日数を追加</button>
    @foreach ($places as $place)
        @component('components.place')
            @slot('images')
                @foreach ($images as $image)
                    @if ($image->place_id === $place->id)
                        <li><img src="{{asset('storage/image/'.$image->name)}}" class="spot__image"></li>
                    @endif
                @endforeach
            @endslot
            @slot('place_id')
                {{$place->id}}
            @endslot
            @slot('place_name')
                {{$place->name}}
            @endslot
            @slot('place_address')
                {{$place->address}}
            @endslot
            @slot('place_description')
                {{$place->description}}
            @endslot
            @slot('post_id')
                {{$post->id}}
            @endslot
            @slot('place_image')
                <form method="post" action="/edit/spot/add_image" enctype="multipart/form-data">
                    @csrf
                    <div class="spot__image">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="hidden" name="place_id" value="{{$place->id}}">
                        <input type="file" name="image" value="{{old('image')}}">
                        <input type="submit" value="add image">
                    </div>
                </form>
            @endslot
        @endcomponent
    @endforeach
    <a href="/edit/spot/{{$post->id}}">スポットを追加</a>
@endsection
@section('js')
<script src="{{asset('assets/js/slick.js')}}"></script>
@endsection