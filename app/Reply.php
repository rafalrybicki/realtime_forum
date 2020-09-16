<?php

namespace App;

use App\Like;
use App\User;
use App\Question;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($reply) {
            $reply->user_id = auth()->id();
        });
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    protected $guarded = [];
}
