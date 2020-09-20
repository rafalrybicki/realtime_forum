<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Events\AddQuestionEvent;
use App\Events\DeleteQuestionEvent;
use App\Events\UpdateQuestionEvent;
use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        return  QuestionResource::collection(Question::latest()->paginate(10));
    }

    public function store(QuestionRequest $request)
    {
        $request->body = htmlentities($request->body);
        $question = auth()->user()->questions()->create($request->all());
        broadcast(new AddQuestionEvent($question))->toOthers();
        return response(new QuestionResource($question), 201);
    }

    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        broadcast(new UpdateQuestionEvent($question->id, $question->title, $question->body))->toOthers();
        return response('update', 202);
    }

    public function destroy(Question $question)
    {
        $question->delete();
        broadcast(new DeleteQuestionEvent($question->id))->toOthers();
        return response(null, 204);
    }
}
