@extends('layouts.l-app')
@section('title', '投稿作成 / travel')
@section('main')
    <h2>新しく投稿する</h2>
    <p>新しく投稿できます。</p>
    <div class="create">
        <form action="/edit" method="post" class="forms">
            <input type="hidden" name="user_id" value="{{$user_id}}">
            @csrf
            <table class="forms__table">
                <tr>
                    <td>タイトル</td>
                    <td>
                        @error('name')
                            <p class="error">{{$message}}</p>
                        @enderror
                        <input type="text" name="name" value="{{old('name')}}" class="forms__table--title">
                    </td>
                    <td class="title-count counter">0/30</td>
                </tr>
                <tr>
                    <td>旅程紹介</td>
                    <td>
                        @error('description')
                            <p class="error">{{$message}}</p>
                        @enderror
                        <textarea cols="30" rows="10" name="description" class="forms__table--description">{{old('description')}}</textarea>
                    </td>
                    <td class="description-count counter">0/500</td>
                </tr>
                <tr>
                    <td>タグ</td>
                    <td>
                        @if ($errors->has('tag') || $errors->has('tag2') || $errors->has('tag3') || $errors->has('tag4') || $errors->has('tag5'))
                            <p class="error">タグキーワードは8文字以内で入力してください。</p>
                        @endif
                        <p>	関連のあるタグキーワードを最大5つまで登録することができます。<br>タグを登録しておくと、他の人から見つけてもらいやすくなります。</p>
                        <input type="text" name="tag" class="forms__table--tag" value="{{old('tag')}}">
                        <input type="text" name="tag2" class="forms__table--tag" value="{{old('tag2')}}">
                        <input type="text" name="tag3" class="forms__table--tag" value="{{old('tag3')}}">
                        <input type="text" name="tag4" class="forms__table--tag" value="{{old('tag4')}}">
                        <input type="text" name="tag5" class="forms__table--tag" value="{{old('tag5')}}">
                    </td>
                </tr>
            </table>
            <div class="create--submit"><input type="submit" value="作成" class="button create--button"></div>
        </form>
    </div>
@endsection