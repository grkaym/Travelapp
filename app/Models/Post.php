<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'open_flag'];

    // // PKの変更
    // protected $primaryKey = 'id';

    // // hasMany設定
    // public function tags()
    // {
    //     return $this->hasMany(Tag::class);
    // }

    // // belongsToの設定
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
