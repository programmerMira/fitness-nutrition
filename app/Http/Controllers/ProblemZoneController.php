<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProblemZoneStoreRequest;
use App\Http\Requests\ProblemZoneUpdateRequest;
use App\Http\Resources\ProblemZoneCollection;
use App\Http\Resources\ProblemZoneResource;
use App\Models\ProblemZone;
use Illuminate\Http\Request;

class ProblemZoneController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ProblemZoneCollection
     */
    public function index(Request $request)
    {
        $problemZones = ProblemZone::all();

        return new ProblemZoneCollection($problemZones);
    }

    /**
     * @param \App\Http\Requests\ProblemZoneStoreRequest $request
     * @return \App\Http\Resources\ProblemZoneResource
     */
    public function store(ProblemZoneStoreRequest $request)
    {
        $problemZone = ProblemZone::create($request->validated());

        return new ProblemZoneResource($problemZone);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProblemZone $problemZone
     * @return \App\Http\Resources\ProblemZoneResource
     */
    public function show(Request $request, $problemZoneId)
    {
        $problemZone = ProblemZone::find($problemZoneId);
        return new ProblemZoneResource($problemZone);
    }

    /**
     * @param \App\Http\Requests\ProblemZoneUpdateRequest $request
     * @param \App\Models\ProblemZone $problemZone
     * @return \App\Http\Resources\ProblemZoneResource
     */
    public function update(ProblemZoneUpdateRequest $request, $problemZoneId)
    {
        $problemZone = ProblemZone::find($problemZoneId);
        $problemZone->update($request->validated());

        return new ProblemZoneResource($problemZone);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProblemZone $problemZone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $problemZoneId)
    {
        $problemZone = ProblemZone::find($problemZoneId);
        $problemZone->delete();

        return response()->noContent();
    }
}
