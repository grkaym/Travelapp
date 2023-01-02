@extends('layouts.l-app')
@section('title', 'edit')
@section('main')
    <p>this page is detail page. post ID = {{$post->id}}</p>
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
    
@endsection