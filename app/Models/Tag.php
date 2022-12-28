<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // timestampを利用しない
    public $timestamps = false;

    // // belongsToの設定
    // public function posts()
    // {
    //     return $this->belongsTo(Post::class);
    // }
}
