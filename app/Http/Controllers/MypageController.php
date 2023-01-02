<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;

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
        $posts      = Post::where('user_id', Auth::id())->get();
        $tags       = Tag::all();
        $users      = User::all();

        return view('index', [
            'posts' => $posts,
            'tags'  => $tags,
            'users' => $users,
            'user_name' => $user_name,
        ]);
    }
}
