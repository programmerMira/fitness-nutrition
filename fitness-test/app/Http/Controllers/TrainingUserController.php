<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingUserStoreRequest;
use App\Http\Requests\TrainingUserUpdateRequest;
use App\Http\Resources\TrainingUserCollection;
use App\Http\Resources\TrainingUserResource;
use App\Models\TrainingUser;
use Illuminate\Http\Request;

class TrainingUserController extends Controller
{
    public function index(Request $request)
    {
        $trainingUsers = TrainingUser::all();

        return new TrainingUserCollection($trainingUsers);
    }

    public function store(TrainingUserStoreRequest $request)
    {
        $trainingUser = TrainingUser::create($request->validated());

        return new TrainingUserResource($trainingUser);
    }

    public function show(Request $request, $trainingUserId)
    {
        $trainingUser = TrainingUser::find($trainingUserId);
        return new TrainingUserResource($trainingUser);
    }

    public function update(TrainingUserUpdateRequest $request, $trainingUserId)
    {
        $trainingUser = TrainingUser::find($trainingUserId);
        $trainingUser->update($request->validated());
        return new TrainingUserResource($trainingUser);
    }

    public function destroy(Request $request, $trainingUserId)
    {
        $trainingUser = TrainingUser::find($trainingUserId);
        $trainingUser->delete();
        return response()->noContent();
    }
}
