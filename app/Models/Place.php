<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;

class Place extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    // belongsToの設定
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
