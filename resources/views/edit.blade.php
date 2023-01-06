@extends('layouts.l-app')
@section('title', 'edit')
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
        <input type="hidden" name="selectedDay" value="1" id="selectedDay">  {{--選択中のDay--}}
        @for ($i = 1; $i <= (int) $post->day ; $i++)
        <div class="day__button js_day">
            <input type="hidden" value="{{$i}}" class="today">
            {{$i}}日目
        </div>
        @endfor
        <button class="day__button day__button--add">+</button>
    </div>

    <a href="/edit/spot/{{$post->id}}">スポットを追加</a>

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
                <form method="post" action="/edit/spot/add_image" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input type="hidden" name="place_id" value="{{$place->id}}">
                    <div class="place__image">
                        <label class="button place__label--select">
                            画像を追加
                            <input type="file" name="image" value="{{old('image')}}" style="display: none;" class="place__button--select">
                        </label>
                        <p class="file-name"></p>
                        <input type="submit" value="send" class="button invisible place__button--send">
                    </div>
                </form>
            @endslot
        @endcomponent
    @endforeach
@endsection
@section('js')
<script src="{{asset('/assets/js/slick.js')}}"></script>
@endsection