<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Place;
use App\Models\Image;
use App\Models\Tag;
use App\Models\Like;

class DetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $post_id = $request->id;
        $post = Post::find($post_id);
        $post_user = $post->user->name;
        $tags = Tag::where('post_id', $post_id)->get();
        $places = Place::where('post_id', $post_id)->get();  //スポット
        $images = Image::all(); //画像ぜんぶ
        $like = new Like;
        $liked = $like->isLike(Auth::id(), $post_id);

        return view('detail', [
            'post' => $post,
            'tags' => $tags,
            'post_user' => $post_user,
            'places' => $places,
            'images' => $images,
            'liked' => $liked,
        ]);
    }
}
