<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function isLike($user_id, $post_id)
    {
        $ret = $this->where('user_id', $user_id)
        ->where('post_id', $post_id)
        ->exists();

        return $ret;
    }
}
