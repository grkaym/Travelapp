@extends('layouts.l-app')
@section('title')
    {{$user_name}}さんのマイページ / travel
@endsection
@section('main')
    <h2 class="my__header">{{$user_name}}さんのマイページ</h2>
    <ul class="tab" id="tab">
        <li class="selected">{{$user_name}}さんの投稿</li>
        <li>いいねした投稿</li>
    </ul>
    <div class="tab__wrapper my__post">
        @foreach ($posts as $post)
        @if ($post->open_flag == 1){{--公開済みの投稿だけ表示--}}
        <div class="post__container">
            @component('components.post')
                @slot('post_id')
                    {{$post->id}}
                @endslot
                @slot('post_title')
                    <a href="/detail/{{$post->id}}">{{$post->name}}</a>
                    @if ($post->open_flag == 0)
                        <i class="fa-solid fa-lock"></i>
                    @endif
                @endslot

                @slot('user_id')
                    {{$post->user_id}}
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
                @endslot
            @endcomponent
        </div>    
        @endif
        @endforeach
    </div>
    <div class="tab__wrapper my__liked invisible">
        @foreach ($posts_liked as $post)
        @if ($post->open_flag == 1){{--公開済みの投稿だけ表示--}}
        <div class="post__container">
            @component('components.post')
                @slot('post_id')
                    {{$post->id}}
                @endslot
                @slot('post_title')
                    <a href="/detail/{{$post->id}}">{{$post->name}}</a>
                    @if ($post->open_flag == 0)
                        <i class="fa-solid fa-lock"></i>
                    @endif
                @endslot

                @slot('user_id')
                    {{$post->user_id}}
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
                @endslot
            @endcomponent
        </div>
        @endif
        @endforeach
    </div>
@endsection