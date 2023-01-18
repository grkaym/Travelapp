<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;

class TimelineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // 最初に表示する投稿（２０件）
        $posts  = Post::where('open_flag', 1)->orderBy('updated_at', 'desc')->limit(20)->get();
        $tags   = Tag::all();
        $users  = User::all();

        return view('timeline', [
            'posts' => $posts,
            'users' => $users,
            'tags'  => $tags,
        ]);
    }

    public function ajaxAddContent(Request $request)
    {
        $disp_posts = $request->count;
        $ajax_posts = Post::where('open_flag', 1)->orderBy('updated_at', 'desc')->offset($disp_posts)->limit(20)->get();
        $tags       = Tag::all();
        $users      = User::all();

        return view('components.post_list', [
            'posts' => $ajax_posts,
            'users' => $users,
            'tags'  => $tags,
        ]);
    }
}
