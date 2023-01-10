<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Tag extends Model
{
    use HasFactory;

    // timestampを利用しない
    public $timestamps = false;
    protected $guarded = ['id'];

    // belongsToの設定
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
