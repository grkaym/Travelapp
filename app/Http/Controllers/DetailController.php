<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class DetailController extends Controller
{
    public function index(Request $request)
    {
        $postId = $request->id;
        $post = Post::find($postId);
        $post_user = $post->user->name;
        $tags = Tag::where('post_id', $postId)->get();
        return view('detail', [
            'post' => $post,
            'tags' => $tags,
            'post_user' => $post_user,
        ]);
    }
}
