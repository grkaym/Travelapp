<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use App\Models\Place;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Models\Image;

class CreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::id();
        return view('create', ['user_id' => $user_id]);
    }

    public function create(CreatePostRequest $request)
    {
        // requestをDBに保存
        $forms = $request->only(['user_id', 'name', 'description', 'day']);
        Post::create($forms);
        
        $post_id = Post::latest()->first()->id; //新しい投稿のID

        //作成後はeditにリダイレクト
        return redirect()->action([CreateController::class, 'edit'], ['id' => $post_id]);
    }

    public function edit(Request $request)
    {
        $postId = $request->id;

        $post = Post::find($postId);    //指定IDの投稿
        $post_user = $post->user->name; //投稿者名
        $tags = Tag::where('post_id', $postId)->get();  //タグ
        $places = Place::where('post_id', $postId)->get();  //スポット
        $images = Image::all(); //画像ぜんぶ

        return view('edit', [
            'post' => $post,
            'tags' => $tags,
            'post_user' => $post_user,
            'places' => $places,
            'images' => $images,
        ]);
    }

    public function spot(Request $request)
    {
        $place_id = $request->id;   //これPOSTIDやん
        $images = Image::where('place_id', $place_id)->get();
        return view('spot', [
            'images' => $images,
            'place_id' => $request->id,
        ]);
    }

    public function add(Request $request)
    {
        $place = new Place;
        $items = $request->only(['post_id', 'name', 'address', 'description', 'day']);
        $place->create($items);

        return redirect()->action([CreateController::class, 'edit'], ['id' => $request->post_id]);
    }

    public function addImage(Request $request)
    {
        $place_id = $request->place_id;
        $post_id = $request->post_id;
        $image = new Image;

        // 画像をアップロード
        $image_path = $request->file('image')->store('public/image/');
        $image->name = basename($image_path);
        $image->place_id = $place_id;
        $image->save();
        //spotにリダイレクト
        return redirect()->action([CreateController::class, 'edit'], ['id' => $post_id]);
    }
}
