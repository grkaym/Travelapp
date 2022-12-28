<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class TimelineController extends Controller
{
    public function index()
    {
        $posts  = Post::limit(20)->get();
        $tags   = Tag::all();
        return view('timeline', [
            'posts' => $posts,
            'tags'  => $tags,
        ]);
    }

    public function ajaxAddContent(Request $request)
    {
        $disp_posts = $request->count;
        $ajax_posts = Post::offset($disp_posts)->limit(20)->get();
        $tags   = Tag::all();

        return view('project.post_list', [
            'posts' => $ajax_posts,
            'tags'  => $tags,
        ]);
    }
}
