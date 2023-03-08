<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $user_id = Auth::id();
        $post_id = $request->post_id;

        $like = new Like;

        if($like->isLike($user_id, $post_id)) {
            //もういいねしてるとき
            $like->where('user_id', $user_id)
            ->where('post_id', $post_id)
            ->delete();
        } else {
            //まだいいねしてないとき
            $like->user_id = $user_id;
            $like->post_id = $post_id;
    
            $like->save();
        }
    }
}
