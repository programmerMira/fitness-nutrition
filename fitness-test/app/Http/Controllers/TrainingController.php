<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingStoreRequest;
use App\Http\Requests\TrainingUpdateRequest;
use App\Http\Resources\TrainingCollection;
use App\Http\Resources\TrainingResource;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TrainingCollection
     */
    public function index(Request $request)
    {
        $trainings = Training::all();

        return new TrainingCollection($trainings);
    }

    /**
     * @param \App\Http\Requests\TrainingStoreRequest $request
     * @return \App\Http\Resources\TrainingResource
     */
    public function store(TrainingStoreRequest $request)
    {
        $training = Training::create($request->validated());

        return new TrainingResource($training);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Training $training
     * @return \App\Http\Resources\TrainingResource
     */
    public function show(Request $request, Training $training)
    {
        return new TrainingResource($training);
    }

    /**
     * @param \App\Http\Requests\TrainingUpdateRequest $request
     * @param \App\Models\Training $training
     * @return \App\Http\Resources\TrainingResource
     */
    public function update(TrainingUpdateRequest $request, Training $training)
    {
        $training->update($request->validated());

        return new TrainingResource($training);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Training $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Training $training)
    {
        $training->delete();

        return response()->noContent();
    }
}
