<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        $question = auth()->user()->question()->create($request->all());

        return response(new QuestionResource($question), 201);
    }

    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response('update', 202);
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return response(null, 204);
    }
}
