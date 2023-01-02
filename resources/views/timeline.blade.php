@extends('layouts.l-app')
@section('title', 'timeline')
@section('main')
    <input type="hidden" id="count" value="20">
    @include('components.post_list')
@endsection
@section('js')
    <script src="{{asset('assets/js/scroll.js')}}"></script>
@endsection