<?php

namespace App;

use App\Question;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function repliequestionss()
    {
        return $this->hasMany(Question::class);
    }
}
