<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $keyword = $request->keyword;   //検索ワード

        $posts  = Post::searchAll($keyword);
        $tags   = Tag::all();
        $users  = User::all();

        $count = $posts->count();

        return view('search', [
            'keyword' => $keyword,
            'posts' => $posts,
            'users' => $users,
            'tags'  => $tags,
            'count' => $count,
        ]);
    }

    public function searchByTag($tagName)
    {
        $posts  = Post::searchTag($tagName);
        $tags   = Tag::all();
        $users  = User::all();

        $count = $posts->count();

        return view('search', [
            'keyword' => $tagName,
            'posts' => $posts,
            'users' => $users,
            'tags'  => $tags,
            'count' => $count,
        ]);
    }
}
