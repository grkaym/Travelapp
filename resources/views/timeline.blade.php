@extends('layouts.l-app')
@section('title', 'timeline')
@section('main')
    <p>this page is timeline.</p>
    <input type="hidden" id="count" value="20">
    @include('project.post_list')
@endsection
@section('js')
    <script src="{{asset('assets/js/scroll.js')}}"></script>
@endsection