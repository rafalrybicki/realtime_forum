<?php

namespace App\Http\Controllers;

use App\Like;
use App\Reply;
use App\Events\LikeEvent;
use App\Events\TestEvent;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT');
    }

    public function likeIt(Reply $reply)
    {
        $reply->like()->where('user_id', auth()->id())->create([
            'user_id' => auth()->id()
        ]);

        broadcast(new LikeEvent($reply->id, 1))->toOthers();
    }

    public function unLikeIt(Reply $reply)
    {
        $reply->like()->where('user_id', 1)->first()->delete();
        broadcast(new LikeEvent($reply->id, 0))->toOthers();

        // return response(null, 204);
    }
}
