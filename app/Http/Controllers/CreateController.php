<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Place;
use App\Models\Tag;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\CreatePlaceRequest;
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

    // 投稿を作成
    public function create(CreatePostRequest $request)
    {
        // requestをPOSTに保存
        $post = $request->only(['user_id', 'name', 'description']);

        Post::create($post);
    
        $post_id = Post::latest()->first()->id; //新しい投稿のID

        // Tagを保存
        $tags = [
            $request->tag,
            $request->tag2,
            $request->tag3,
            $request->tag4,
            $request->tag5,
        ];

        // nullでリクエストされた要素を除去
        foreach($tags as $key => $value) {
            if($value === null) {
                unset($tags[$key]);
            }
        }

        foreach($tags as $requestTag) {
            $tag = new Tag;
            $tag->post_id = $post_id;
            $tag->name = $requestTag;
    
            $tag->save();
        }

        //作成後はeditにリダイレクト
        return redirect()->action([CreateController::class, 'edit'], ['id' => $post_id]);
    }

    // 投稿を削除(それに伴って同じIDを持つ場所、タグ、いいねも削除)
    public function postDelete(Request $request)
    {
        $post_id = $request->post_id;

        $post = Post::find($post_id);
        $post->delete();

        $place = Place::where('post_id', $post_id);
        $place->delete();

        $tag = Tag::where('post_id', $post_id);
        $tag->delete();

        $like = Like::where('post_id', $post_id);
        $like->delete();

        return redirect()->action([MypageController::class, 'index']);
    }

    // 編集画面
    public function edit(Request $request)
    {
        $postId = $request->id;

        $post = Post::find($postId);    //指定IDの投稿
        $post_user = $post->user->name; //投稿者名
        $tags = Tag::where('post_id', $postId)->get();  //タグ
        $places = Place::where('post_id', $postId)->get();  //スポット
        $images = Image::all(); //画像ぜんぶ
        $user_id = Auth::id();

        return view('edit', [
            'post' => $post,
            'tags' => $tags,
            'post_user' => $post_user,
            'places' => $places,
            'images' => $images,
            'user_id' => $user_id,
        ]);
    }

    // 日数を追加
    public function addDay(Request $request)
    {
        $post = Post::find($request->post_id);

        if((int)$post->day >= 10) {
            return redirect()->action([CreateController::class, 'edit'], ['id' => $request->post_id]);
        }

        $post->day = (int)$post->day + 1;

        $post->save();

        return redirect()->action([CreateController::class, 'edit'], ['id' => $request->post_id]);
    }

    // 日数を減らす
    public function removeDay(Request $request)
    {
        $post = Post::find($request->post_id);
        $del_day = $post->day;

        if((int)$post->day <= 1) {
            return redirect()->action([CreateController::class, 'edit'], ['id' => $request->post_id]);
        }

        $post->day = (int)$post->day - 1;

        $post->save();

        $place = new Place;

        $place->where('post_id', $request->post_id)->where('day', $del_day)->delete();

        return redirect()->action([CreateController::class, 'edit'], ['id' => $request->post_id]);
    }

    public function spot(Request $request)
    {
        $post_id = $request->id;
        $day = $request->selectedDay;
        // $images = Image::where('place_id', $post_id)->get();
        return view('spot', [
            // 'images' => $images,
            'post_id' => $post_id,
            'day' => $day,
        ]);
    }

    // スポットを追加
    public function add(CreatePlaceRequest $request)
    {
        $place = new Place;
        $items = $request->only(['post_id', 'name', 'address', 'description', 'day']);
        $place->create($items);

        return redirect()->action([CreateController::class, 'edit'], ['id' => $request->post_id]);
    }

    // スポット削除
    public function spotDelete(Request $request)
    {
        Place::where('id', $request->place_id)->delete();

        return redirect()->action([CreateController::class, 'edit'], ['id' => $request->post_id]);
    }

    // 画像を追加
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

    public function complete(Request $request)
    {
        $post = Post::find($request->post_id);

        $post->open_flag = 1;

        $post->save();

        return redirect('/');
    }

    public function rename(Request $request)
    {
        return view('rename', [
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'place_id' => $request->place_id,
            'post_id' => $request->post_id

        ]);
    }

    public function updateSpot(CreatePlaceRequest $request)
    {
        $post_id = $request->post_id;
        $place_id = $request->place_id;

        $place = Place::find($place_id);

        $place->name        = $request->name;
        $place->address     = $request->address;
        $place->description = $request->description;

        $place->save();

        return redirect()->action([CreateController::class, 'edit'], ['id' => $post_id]);
    }
}
