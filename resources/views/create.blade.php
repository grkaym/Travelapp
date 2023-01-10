@extends('layouts.l-app')
@section('title', 'create')
@section('main')
    <h2>Create Post</h2>
    <div class="create">
        <form action="/edit" method="post" class="forms">
            <input type="hidden" name="user_id" value="{{$user_id}}">
            @csrf
            <table class="forms__table">
                <tr>
                    <td>title</td>
                    <td>
                        @error('name')
                            <p>{{$message}}</p>
                        @enderror
                        <input type="text" name="name" value="{{old('name')}}" class="forms__table--title">
                    </td>
                    <td class="title-count counter">0/30</td>
                </tr>
                <tr>
                    <td>description</td>
                    <td>
                        @error('description')
                            <p>{{$message}}</p>
                        @enderror
                        <textarea cols="30" rows="10" name="description" class="forms__table--description">{{old('description')}}</textarea>
                    </td>
                    <td class="description-count counter">0/500</td>
                </tr>
                <tr>
                    <td>tag</td>
                    <td>
                        <input type="text" name="tag" class="forms__table--tag">
                        <input type="text" name="tag2" class="forms__table--tag">
                        <input type="text" name="tag3" class="forms__table--tag">
                        <input type="text" name="tag4" class="forms__table--tag">
                        <input type="text" name="tag5" class="forms__table--tag">
                    </td>
                </tr>
                <tr>
                    <td>days</td>
                    <td>
                        @error('day')
                            <p>{{$message}}</p>
                        @enderror
                        <input type="text" name="day" value="{{old('day')}}" class="forms__table--days">
                    </td>
                    <td class="days-count counter"></td>
                </tr>
            </table>
            <td><input type="submit" value="作成" class="button"></td>
        </form>
    </div>
@endsection