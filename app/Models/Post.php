<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // // PKの変更
    // protected $primaryKey = 'id';

    // // hasMany設定
    // public function tags()
    // {
    //     return $this->hasMany(Tag::class);
    // }
}
