<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingLocationStoreRequest;
use App\Http\Requests\TrainingLocationUpdateRequest;
use App\Http\Resources\TrainingLocationCollection;
use App\Http\Resources\TrainingLocationResource;
use App\Models\TrainingLocation;
use Illuminate\Http\Request;

class TrainingLocationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TrainingLocationCollection
     */
    public function index(Request $request)
    {
        $trainingLocations = TrainingLocation::all();

        return new TrainingLocationCollection($trainingLocations);
    }

    /**
     * @param \App\Http\Requests\TrainingLocationStoreRequest $request
     * @return \App\Http\Resources\TrainingLocationResource
     */
    public function store(TrainingLocationStoreRequest $request)
    {
        $trainingLocation = TrainingLocation::create($request->validated());

        return new TrainingLocationResource($trainingLocation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TrainingLocation $trainingLocation
     * @return \App\Http\Resources\TrainingLocationResource
     */
    public function show(Request $request, TrainingLocation $trainingLocation)
    {
        return new TrainingLocationResource($trainingLocation);
    }

    /**
     * @param \App\Http\Requests\TrainingLocationUpdateRequest $request
     * @param \App\Models\TrainingLocation $trainingLocation
     * @return \App\Http\Resources\TrainingLocationResource
     */
    public function update(TrainingLocationUpdateRequest $request, TrainingLocation $trainingLocation)
    {
        $trainingLocation->update($request->validated());

        return new TrainingLocationResource($trainingLocation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TrainingLocation $trainingLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TrainingLocation $trainingLocation)
    {
        $trainingLocation->delete();

        return response()->noContent();
    }
}
