@extends('layouts.l-app')
@section('title', '投稿を見る / travel')
@section('main')
    <input type="hidden" id="count" value="20">
    <div class="post__wrapper js-post">
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
@section('js')
    <script src="{{asset('/assets/js/scroll.js')}}"></script>
@endsection