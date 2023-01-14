@extends('layouts.l-app')
@section('title', 'travel - edit')
@section('main')
    {{-- <p>this page is edit page. post ID = {{$post->id}}</p> --}}
    {{-- コンポーネントを使ってヘッド部分を表示する --}}
    <div class="edit__post">
        @component('components.post')
            @slot('post_id')
                {{$post->id}}
            @endslot
    
            @slot('post_title')
                {{$post->name}}
                @if ($post->open_flag == 0)
                    <i class="fa-solid fa-lock"></i>
                @endif
            @endslot
            @slot('user_id')
                {{$post->user_id}}
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
    </div>

    <div class="day">
        <div class="message">
            @isset($message)
                {{$message}}
            @endisset
        </div>
        <a href="/edit/remove_day/{{$post->id}}"><button class="day__button day__button--remove"><i class="fa-solid fa-minus"></i></button></a>
        @for ($i = 1; $i <= (int) $post->day ; $i++)
        <div class="day__button js_day">
            <input type="hidden" value="{{$i}}" class="today">
            {{$i}}日目
        </div>
        @endfor
        <a href="/edit/add_day/{{$post->id}}"><button class="day__button day__button--add"><i class="fa-solid fa-plus"></i></button></a>
    </div>

    @foreach ($places as $place)
        @component('components.place')
            @slot('place_day', $place->day)
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
                <form method="post" action="/edit/spot/add_image/{{$place->id}}" enctype="multipart/form-data" id="{{$place->id}}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}" form="{{$place->id}}">
                    <input type="hidden" name="place_id" value="{{$place->id}}" form="{{$place->id}}" class="place_id">
                    <div class="place__image">
                        <label class="button place__label--select">
                            選択
                            <input type="file" name="image" value="{{old('image')}}" accept="image/jpg, image/jpeg, image/png" style="display: none;" class="place__button--select" form="{{$place->id}}">
                        </label>
                        <p class="file-name"></p>
                        <input type="submit" value="追加" class="button invisible place__button--send" form="{{$place->id}}">
                    </div>
                </form>

                {{-- 場所削除 --}}
                <div class="place__button-container">
                    <div class="place__delete">
                        <form action="/edit/spot/delete/{{$place->id}}" id="delete_{{$place->id}}" method="post">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}" form="delete_{{$place->id}}">
                            <input type="hidden" name="place_id" value="{{$place->id}}" class="place_id" form="delete_{{$place->id}}">
                            <button type="submit" class="place__delete--button" form="delete_{{$place->id}}"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                    <div class="place__edit">
                        <form action="/rename" method="post" id="edit_{{$place->id}}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}" form="edit_{{$place->id}}">
                            <input type="hidden" name="place_id" value="{{$place->id}}" form="edit_{{$place->id}}">
                            <input type="hidden" name="name" value="{{$place->name}}" form="edit_{{$place->id}}">
                            <input type="hidden" name="description" value="{{$place->description}}" form="edit_{{$place->id}}">
                            <input type="hidden" name="address" value="{{$place->address}}" form="edit_{{$place->id}}">
                            <button type="submit" class="place__edit--button" form="edit_{{$place->id}}">
                                <i class="fa-regular fa-pen-to-square edit-button"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endslot
        @endcomponent
    @endforeach
    <form class="add-button" method="post" action="/edit/spot/{{$post->id}}">
        @csrf
        <input type="hidden" name="selectedDay" value="1" id="selectedDay">  {{--選択中のDay--}}
        <button type="submit" class="button button--add-spot button--wide">スポットを追加</button>
    </form>
    <form action="/complete" id="complete_{{$post->id}}" method="get">
        <input type="hidden" name="post_id" value="{{$post->id}}" form="complete_{{$post->id}}">
        @if ($post->open_flag == 0)
            <button type="submit" class="button button--done button--wide" form="complete_{{$post->id}}">公開する</button>
        @endif
    </form>
@endsection
@section('js')
<script src="{{asset('/assets/js/slick.js')}}"></script>
@endsection