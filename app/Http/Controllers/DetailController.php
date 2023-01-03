<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Place;
use App\Models\Image;
use App\Models\Tag;

class DetailController extends Controller
{
    public function index(Request $request)
    {
        $postId = $request->id;
        $post = Post::find($postId);
        $post_user = $post->user->name;
        $tags = Tag::where('post_id', $postId)->get();
        $places = Place::where('post_id', $postId)->get();  //スポット
        $images = Image::all(); //画像ぜんぶ
        return view('detail', [
            'post' => $post,
            'tags' => $tags,
            'post_user' => $post_user,
            'places' => $places,
            'images' => $images,
        ]);
    }
}
