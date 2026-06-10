<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['user_id','message'];
    //Many comments belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
