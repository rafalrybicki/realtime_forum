<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Question;
use Illuminate\Http\Request;
use App\Events\AddReplyEvent;
use App\Events\DeleteReplyEvent;
use App\Events\UpdateReplyEvent;
use App\Http\Resources\ReplyResource;
use App\Notifications\NewReplyNotification;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index', 'show']]);
    }

    public function index(Question $question)
    {
        return ReplyResource::collection($question->replies);
    }

    public function store(Question $question, Request $request)
    {
        $reply = $question->replies()->create($request->all());
        $user = $question->user;
        if ($reply->user_id !== $question->user_id) {
            $user->notify(new NewReplyNotification($reply));
        }
        broadcast(new AddReplyEvent($reply))->toOthers();
        return response(['reply' => new ReplyResource($reply)], 201);
    }

    public function show(Question $question, Reply $reply)
    {
        return new ReplyResource($reply);
    }

    public function update(Question $question, Request $request, Reply $reply)
    {

        $reply->update($request->all());
        broadcast(new UpdateReplyEvent($reply->id, $reply->body))->toOthers();
        return response('update', 202);
    }

    public function destroy(Question $question, Reply $reply)
    {
        $reply->delete();
        broadcast(new DeleteReplyEvent($reply->id))->toOthers();
        return response(null, 204);
    }
}
