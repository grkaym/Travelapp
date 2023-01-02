@extends('layouts.l-app')
@section('title', 'create')
@section('main')
    <p>this page is create page.</p>
    <form action="/edit" method="post">
        <input type="hidden" name="user_id" value="{{$user_id}}">
        @csrf
        <table>
            <tr>
                <td>title</td>
                <td>
                    @error('name')
                        <p>{{$message}}</p>
                    @enderror
                    <input type="text" name="name" value="{{old('name')}}">
                </td>
            </tr>
            <tr>
                <td>description</td>
                <td>
                    @error('name')
                        <p>{{$message}}</p>
                    @enderror
                    <textarea cols="30" rows="10" name="description"></textarea>
                </td>
            </tr>
            <tr>
                <td>tag</td>
                <td>
                    @error('name')
                        <p>{{$message}}</p>
                    @enderror
                    <div class="create__tag">
                        <input type="text" name="tag">
                        {{-- <input type="text"name="tag2">
                        <input type="text"name="tag3">
                        <input type="text"name="tag4">
                        <input type="text"name="tag5"> --}}
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="作成"></td>
            </tr>
        </table>
    </form>
@endsection