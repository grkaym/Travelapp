<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Models\Like;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // $posts = Post::all();
        $auth       = Auth::user();
        $user_name  = $auth->name;
        $role       = $auth->role;
        $posts      = Post::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $tags       = Tag::all();
        $users      = User::all();
        $user_id    = Auth::id();

        $like = new Like;
        $post = new Post;

        $posts_liked = $post->whereHas('likes', function($q) use($user_id) {
            $q->where('user_id', $user_id);
        })->get();

        return view('index', [
            'posts' => $posts,
            'tags'  => $tags,
            'users' => $users,
            'user_name' => $user_name,
            'role'  => $role,
            'posts_liked' => $posts_liked,
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
