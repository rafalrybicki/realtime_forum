<?php

namespace App;

use App\User;
use App\Reply;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reply()
    {
        return $this->belongsTo(Reply::class);
    }
    protected $guarded = [];
}
