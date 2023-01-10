@extends('layouts.l-app')
@section('title', 'add-spot')
@section('main')
<h2>Add New Place</h2>
<form action="/edit/spot/add/{{$post_id}}" method="post" class="forms">
    @csrf
    <input type="hidden" name="post_id" value="{{$post_id}}">
    <input type="hidden" name="day" value="{{$day}}">
    <table class="forms__table">
        <tr>
            <td>name</td>
            <td>
                <input type="text" name="name" class="forms__table--title">
            </td>
            <td class="title-count counter">0/30</td>
        </tr>
        <tr>
            <td>address</td>
            <td>
                <input type="text" name="address" class="forms__table--address">
            </td>
            <td class="address-count counter">0/80</td>
        </tr>
        <tr>
            <td>description</td>
            <td>
                {{-- <input type="text" name="description" form="new"> --}}
                <textarea cols="30" rows="10" name="description" class="forms__table--description"></textarea>
            </td>
            <td class="description-count counter">0/500</td>
        </tr>
    </table>
    <input type="submit" value="スポットを追加する" class="button">
</form>
@endsection