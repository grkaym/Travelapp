<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostRejectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $post = Post::find($request->id);
        $post_user = $post->user_id;
        $open_flag = $post->open_flag;

        if(Auth::id() !== $post_user && $open_flag == 0) {  //投稿が非公開かつ投稿主以外がアクセスしてきたとき
            return redirect()->back();
        }

        return $next($request);
    }
}
