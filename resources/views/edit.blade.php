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
        @slot('post_desc')
            {{$post->description}}
        @endslot
        @slot('post_tag')
            @foreach ($tags as $tag)
                {{$tag->name}}
            @endforeach
        @endslot
    @endcomponent
    <button>日数を追加</button>
    @foreach ($places as $place)
        <h3>{{$place->name}}</h3>
        <p>{{$place->address}}</p>
        <p>{{$place->description}}</p>
    @endforeach
    <a href="/edit/spot/{{$post->id}}">スポットを追加</a>
@endsection