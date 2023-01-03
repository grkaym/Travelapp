{{-- 画像 --}}
<p>image</p>
{{-- 画像アップロードするところ --}}
<form method="post" action="{{$path}}" enctype="multipart/form-data">
    @csrf
    <div class="spot__image">
        <input type="file" name="image" value="{{old('image')}}">
        <input type="submit" value="add image">
    </div>
</form>
{{-- 画像表示するところ --}}
@foreach ($images as $image)
    <img src="{{asset('storage/image/'.$image->name)}}" class="spot__image">
@endforeach