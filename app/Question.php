<?php

namespace App;

use App\User;
use App\Reply;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function getRoutekeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }

    protected $guarded = [];
}
