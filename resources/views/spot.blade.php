@extends('layouts.l-app')
@section('title', 'add-spot')
@section('main')
<h2>Add New Place</h2>
<form action="/edit/spot/add" id="new" method="post" class="forms">
    @csrf
    <table class="forms__table">
        <input type="hidden" name="post_id" value="{{$place_id}}" form="new">
        <tr>
            <td>name</td>
            <td>
                <input type="text" name="name" form="new">
            </td>
        </tr>
        <tr>
            <td>address</td>
            <td>
                <input type="text" name="address" form="new">
            </td>
        </tr>
        <tr>
            <td>description</td>
            <td>
                <input type="text" name="description" form="new">
            </td>
        </tr>
        <tr>
            <td>day</td>
            <td>
                <input type="text" name="day" form="new">
            </td>
        </tr>
    </table>
    <input type="submit" value="スポットを追加する" class="button">
</form>
@endsection