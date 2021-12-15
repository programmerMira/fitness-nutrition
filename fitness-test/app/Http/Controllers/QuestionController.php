<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Http\Resources\QuestionCollection;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $questions = Question::all();

        return new QuestionCollection($questions);
    }

    public function store(QuestionStoreRequest $request)
    {
        $question = Question::create($request->validated());

        return new QuestionResource($question);
    }

    public function show(Request $request, $questionID)
    {
        $question = Question::find($questionID);
        return new QuestionResource($question);
    }

    public function update(QuestionUpdateRequest $request, $questionID)
    {
        $question = Question::find($questionID);
        $question->update($request->validated());
        return new QuestionResource($question);
    }

    public function destroy(Request $request, $questionID)
    {
        $question = Question::find($questionID);
        $question->delete();
        return response()->noContent();
    }
}
