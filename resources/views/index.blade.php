@extends('layouts.l-app')
@section('title', 'マイページ / travel')
@section('main')
    @if ($role == 0)
        <h2 class="my__header">{{$user_name}}さん(管理者)のマイページ</h2>
    @else
        <h2 class="my__header">{{$user_name}}さんのマイページ</h2>
    @endif
    @if ($role == 0)
        <a href="/list" class="my__userlist">ユーザーリストを表示</a>        
    @endif
    <ul class="tab" id="tab">
        <li class="selected">自分の投稿</li>
        <li>いいねした投稿</li>
    </ul>
    <div class="tab__wrapper my__post">
        @if ($post_count == 0)
            <div class="nopost">
                <p>まだ投稿がありません。</p>
                <br>
                <p>「作成する」から新しい旅程を作ってみましょう。</p>
            </div>
        @endif
        @foreach ($posts as $post)
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
                    <div class="edit__container">
                        <p class="post__edit"><a href="/edit/{{$post->id}}" class="post__link--edit"><i class="fa-regular fa-pen-to-square edit-button"></i></a></p>
                        {{-- 投稿削除 --}}
                        <div class="post__delete">
                            <form action="/edit/delete/{{$post->id}}" id="delete_post_{{$post->id}}" method="post">
                                @csrf
                                <input type="hidden" name="post_id" value="{{$post->id}}" form="delete_post_{{$post->id}}">
                                <input type="hidden" name="user_id" value="{{$post->user_id}}" form="delete_post_{{$post->id}}">
                                <button type="submit" class="post__delete--button" form="delete_post_{{$post->id}}"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                @endslot
            @endcomponent
        </div>
        @endforeach
    </div>
    <div class="tab__wrapper my__liked invisible">
        @if ($like_count == 0)
        <div class="nopost">
            <p>まだいいねした投稿がありません。</p>
            <br>
            <p>「投稿を見る」からユーザーの旅程を見てみましょう。</p>
        </div>
        @endif
        @foreach ($posts_liked as $post)
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
        @endforeach
    </div>
@endsection