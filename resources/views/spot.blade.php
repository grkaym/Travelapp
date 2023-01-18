@extends('layouts.l-app')
@section('title', 'スポット追加 / travel')
@section('main')
<h2>スポットを追加する</h2>
<p><span class="color-red">*</span>は入力必須です。</p>
<form action="/edit/spot/add/{{$post_id}}" method="post" class="forms">
    @csrf
    <input type="hidden" name="post_id" value="{{$post_id}}">
    <input type="hidden" name="day" value="{{old('day', $day)}}">
    <table class="forms__table">
        <tr>
            <td><span class="color-red">*</span>名前</td>
            <td>
                @error('name')
                    <p class="error">{{$message}}</p>
                @enderror
                <input type="text" name="name" class="forms__table--title" value="{{old('name')}}">
            </td>
            <td class="title-count counter">0/30</td>
        </tr>
        <tr>
            <td><span class="color-red">*</span>住所</td>
            <td>
                @error('address')
                    <p class="error">{{$message}}</p>
                @enderror
                <input type="text" name="address" class="forms__table--address" value="{{old('address')}}">
            </td>
            <td class="address-count counter">0/80</td>
        </tr>
        <tr>
            <td>スポット紹介</td>
            <td>
                @error('description')
                    <p class="error">{{$message}}</p>
                @enderror
                <textarea cols="30" rows="10" name="description" class="forms__table--description">{{old('description')}}</textarea>
            </td>
            <td class="description-count counter">0/500</td>
        </tr>
    </table>
    <div class="create--submit"><input type="submit" value="スポットを追加する" class="button button__add-spot"></div>
</form>
@endsection