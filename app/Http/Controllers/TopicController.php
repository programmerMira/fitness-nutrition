<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicStoreRequest;
use App\Http\Requests\TopicUpdateRequest;
use App\Http\Resources\TopicCollection;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        $topics = Topic::all();

        return response()->json($topics);
    }

    public function store(TopicStoreRequest $request)
    {
        $topic = Topic::create($request->validated());

        return response()->json($topic);
    }

    public function show(Request $request, $topicID)
    {
        $topic = Topic::find($topicID);
        return response()->json($topic);
    }

    public function update(TopicUpdateRequest $request, $topicID)
    {
        $topic = Topic::find($topicID);
        $topic->update($request->validated());
        return response()->noContent();
    }

    public function destroy(Request $request, $topicID)
    {
        $topic = Topic::find($topicID);
        $topic->delete();
        return response()->noContent();
    }
}
