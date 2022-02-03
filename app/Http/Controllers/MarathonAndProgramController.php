<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarathonAndProgramStoreRequest;
use App\Http\Requests\MarathonAndProgramUpdateRequest;
use App\Http\Resources\MarathonAndProgramCollection;
use App\Http\Resources\MarathonAndProgramResource;
use App\Models\MarathonAndProgram;
use Illuminate\Http\Request;

class MarathonAndProgramController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\MarathonAndProgramCollection
     */
    public function index(Request $request)
    {
        $marathonAndPrograms = MarathonAndProgram::all();

        return new MarathonAndProgramCollection($marathonAndPrograms);
    }

    /**
     * @param \App\Http\Requests\MarathonAndProgramStoreRequest $request
     * @return \App\Http\Resources\MarathonAndProgramResource
     */
    public function store(MarathonAndProgramStoreRequest $request)
    {
        $marathonAndProgram = MarathonAndProgram::create($request->validated());

        return new MarathonAndProgramResource($marathonAndProgram);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MarathonAndProgram $marathonAndProgram
     * @return \App\Http\Resources\MarathonAndProgramResource
     */
    public function show(Request $request, MarathonAndProgram $marathonAndProgram)
    {
        return new MarathonAndProgramResource($marathonAndProgram);
    }

    /**
     * @param \App\Http\Requests\MarathonAndProgramUpdateRequest $request
     * @param \App\Models\MarathonAndProgram $marathonAndProgram
     * @return \App\Http\Resources\MarathonAndProgramResource
     */
    public function update(MarathonAndProgramUpdateRequest $request, MarathonAndProgram $marathonAndProgram)
    {
        $marathonAndProgram->update($request->validated());

        return new MarathonAndProgramResource($marathonAndProgram);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MarathonAndProgram $marathonAndProgram
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MarathonAndProgram $marathonAndProgram)
    {
        $marathonAndProgram->delete();

        return response()->noContent();
    }
}
