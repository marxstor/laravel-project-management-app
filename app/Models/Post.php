<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'post_title'
    ];

    // get the comments for the post
    public function comments() {
        return $this->hasMany(Comment::class, 'user_post_id');
    }
}
