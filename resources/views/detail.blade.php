@extends('layouts.l-app')
@section('title', 'detail')
@section('main')
    <div class="detail__post">
        @component('components.post')
            @slot('post_id')
                {{$post->id}}
            @endslot
            @slot('post_title')
                {{$post->name}}
            @endslot
            @slot('user_id')
                {{$post->user_id}}
            @endslot
            @slot('user_id')
                {{$post->user_id}}
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
            @slot('post_edit')
                
            @endslot
        @endcomponent
        <div class="like-container">
            @if ($liked)
                <i class="fa-solid fa-heart like liked"></i>
            @else
                <i class="fa-solid fa-heart like"></i>                
            @endif
        </div>
    </div>
    <div class="day">
        <input type="hidden" name="selectedDay" value="1" id="selectedDay">  {{--選択中のDay--}}
        @for ($i = 1; $i <= (int) $post->day ; $i++)
            <div class="day__button js_day">
                <input type="hidden" value="{{$i}}" class="today">
                {{$i}}日目
            </div>
        @endfor
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
                
            @endslot
        @endcomponent
    @endforeach
@endsection
@section('js')
<script src="{{asset('assets/js/slick.js')}}"></script>
<script src="{{asset('assets/js/like.js')}}"></script>
@endsection