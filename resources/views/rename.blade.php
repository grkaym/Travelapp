@extends('layouts.l-app')
@section('title', 'スポット更新 / travel')
@section('main')
<h2>スポットを更新する</h2>
<form action="/update_spot" method="post" class="forms">
    @csrf
    <input type="hidden" name="post_id" value="{{old('post_id', $post_id)}}">
    <input type="hidden" name="place_id" value="{{old('place_id', $place_id)}}">
    {{-- <input type="hidden" name="day" value="{{old('day', $day)}}"> --}}
    <table class="forms__table">
        <tr>
            <td>名前</td>
            <td>
                @error('name')
                    <p class="error">{{$message}}</p>
                @enderror
                <input type="text" name="name" class="forms__table--title" value="{{old('name', $name)}}">
            </td>
            <td class="title-count counter">0/30</td>
        </tr>
        <tr>
            <td>住所</td>
            <td>
                @error('address')
                    <p class="error">{{$message}}</p>
                @enderror
                <input type="text" name="address" class="forms__table--address" value="{{old('address', $address)}}">
            </td>
            <td class="address-count counter">0/80</td>
        </tr>
        <tr>
            <td>スポット紹介</td>
            <td>
                @error('description')
                    <p class="error">{{$message}}</p>
                @enderror
                <textarea cols="30" rows="10" name="description" class="forms__table--description">{{old('description', $description)}}</textarea>
            </td>
            <td class="description-count counter">0/500</td>
        </tr>
    </table>
    <div class="create--submit"><input type="submit" value="更新する" class="button"></div>
</form>
@endsection