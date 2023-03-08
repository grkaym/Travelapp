<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;
use App\Models\Place;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // // PKの変更
    // protected $primaryKey = 'id';

    // hasMany設定
    public function tag()
    {
        return $this->hasMany(Tag::class);
    }

    // hasMany設定
    public function place()
    {
        return $this->hasMany(Tag::class);
    }

    // // belongsToの設定
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * 投稿名、投稿desc、タグ名、場所名、場所説明から
     * キーワードを含む投稿を返す
    */
    public static function searchAll($keyword)
    {
        $post = Post::where('name', 'like', '%'.$keyword.'%')
        ->orWhere('description', 'like', '%'.$keyword.'%')
        ->orWhereHas('Tag', function($query) use ($keyword) {
            $query->where('name', 'like', '%'.$keyword.'%');
        })
        ->orWhereHas('Place', function($query) use ($keyword) {
            $query->where('name', 'like', '%'.$keyword.'%')
            ->orWhere('description', 'like', '%'.$keyword.'%');
        })
        ->orderBy('id', 'desc')
        ->get();

        return $post;
    }

    public static function searchTag($tag)
    {
        $post = Post::whereHas('Tag', function($query) use ($tag) {
            $query->where('name', $tag);
        })
        ->orderBy('id', 'desc')
        ->get();

        return $post;
    }
}
