@extends('layouts.l-app')
@section('title', 'mypage')
@section('main')
    <h2>{{$user_name}}さんのマイページ</h2>
    <a href="/list">ユーザーリストを表示</a>
    @include('components.post_list')
@endsection