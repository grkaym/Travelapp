@extends('layouts.l-app')
@section('title', 'add-spot')
@section('main')
    <p>this page is spot page.</p>
    <table>
        <input type="hidden" name="post_id" value="{{$place_id}}" form="new">
            @csrf
        <tr>
            <td>name</td>
            <td><input type="text" name="name" form="new"></td>
        </tr>
        <tr>
            <td>address</td>
            <td><input type="text" name="address" form="new"></td>
        </tr>
        <tr>
            <td>description</td>
            <td><input type="text" name="description" form="new"></td>
        </tr>
            <tr>
                <td>image</td>
                <td>
                    <form method="post" action="/edit/spot/add_image" enctype="multipart/form-data">
                        @csrf
                        <div class="spot__image">
                            <input type="hidden" name="place_id" value="{{$place_id}}">
                            <input type="file" name="image" value="{{old('image')}}">
                            <input type="submit" value="add image">
                        </div>
                    </form>
                    @foreach ($images as $image)
                        <img src="{{asset('storage/image/'.$image->name)}}" class="spot__image">
                    @endforeach
                </td>
            </tr>
        </table>
        <form action="/edit/spot/add" id="new" method="post">
            @csrf
            <input type="submit" value="create new spot">
        </form>
@endsection