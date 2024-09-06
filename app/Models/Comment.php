<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'comment_content',
        'user_post_id'
    ];

    // defining the inverse relationship of the comment and post model
    // get the the post that owns the comment
    public function post() {
        return $this->belongsTo(Post::class, 'user_post_id');
    }
}
