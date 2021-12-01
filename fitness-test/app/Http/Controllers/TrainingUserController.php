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
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TrainingUserCollection
     */
    public function index(Request $request)
    {
        $trainingUsers = TrainingUser::all();

        return new TrainingUserCollection($trainingUsers);
    }

    /**
     * @param \App\Http\Requests\TrainingUserStoreRequest $request
     * @return \App\Http\Resources\TrainingUserResource
     */
    public function store(TrainingUserStoreRequest $request)
    {
        $trainingUser = TrainingUser::create($request->validated());

        return new TrainingUserResource($trainingUser);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TrainingUser $trainingUser
     * @return \App\Http\Resources\TrainingUserResource
     */
    public function show(Request $request, TrainingUser $trainingUser)
    {
        return new TrainingUserResource($trainingUser);
    }

    /**
     * @param \App\Http\Requests\TrainingUserUpdateRequest $request
     * @param \App\Models\TrainingUser $trainingUser
     * @return \App\Http\Resources\TrainingUserResource
     */
    public function update(TrainingUserUpdateRequest $request, TrainingUser $trainingUser)
    {
        $trainingUser->update($request->validated());

        return new TrainingUserResource($trainingUser);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TrainingUser $trainingUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TrainingUser $trainingUser)
    {
        $trainingUser->delete();

        return response()->noContent();
    }
}
