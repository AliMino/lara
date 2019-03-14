<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'comment',
    ];

    public function post()
    {
        // return $this->belongsTo('App\User');
        return $this->belongsTo(Post::class);
    }
}
