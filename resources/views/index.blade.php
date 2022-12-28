@extends('layouts.l-app')
@section('title', 'mypage')
@section('main')
    <h2>{{$user_name}}さんのマイページ</h2>
    @include('project.post_list')
@endsection