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
        $questions = Question::with('topic')->get();

        return response()->json($questions);
    }

    public function store(QuestionStoreRequest $request)
    {
        $question = Question::create($request->validated());

        return response()->json($question);
    }

    public function show(Request $request, $questionID)
    {
        $question = Question::find($questionID);
        return response()->json($question);
    }

    public function update(QuestionUpdateRequest $request, $questionID)
    {
        $question = Question::find($questionID);
        $question->update($request->validated());
        return response()->noContent();
    }

    public function destroy(Request $request, $questionID)
    {
        $question = Question::find($questionID);
        $question->delete();
        return response()->noContent();
    }
}
