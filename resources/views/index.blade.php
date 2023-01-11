@extends('layouts.l-app')
@section('title', 'mypage')
@section('main')
    <h2>{{$user_name}}さんのマイページ</h2>
    <a href="/list">ユーザーリストを表示</a>
    {{-- 取得した投稿をすべて表示する。 --}}
@foreach ($posts as $post)
<div class="post__container">
    @component('components.post')
        @slot('post_id')
            {{$post->id}}
        @endslot
        @slot('post_title')
            <a href="/detail/{{$post->id}}">{{$post->name}}</a>
        @endslot
    
        @slot('post_user')
        @foreach ($users as $user)
            @if ($user->id === $post->user_id)
                {{$user->name}}
                @break
            @endif
        @endforeach
        @endslot
    
        @slot('post_tag')
            @foreach ($tags as $tag)
                @if ($post->id === $tag->post_id)
                    <a href="/search/tag/{{$tag->name}}">{{$tag->name}}</a>
                @endif
            @endforeach
        @endslot
    
        @slot('post_desc')
            {{$post->description}}
        @endslot
        
        @slot('post_edit')
            <p class="post__edit"><a href="/edit/{{$post->id}}" class="post__link--edit"><i class="fa-regular fa-pen-to-square edit-button"></i></a></p>
        @endslot
    @endcomponent
</div>
@endforeach
@endsection