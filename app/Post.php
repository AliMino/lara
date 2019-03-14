<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use Sluggable;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function user()
    {
        // return $this->belongsTo('App\User');
        return $this->belongsTo(User::class);
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }
}
