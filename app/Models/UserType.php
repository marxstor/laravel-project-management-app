<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_type',
        'user_id'
    ];

    // get the user that owns the user type
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
