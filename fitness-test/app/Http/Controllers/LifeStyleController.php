<?php

namespace App\Http\Controllers;

use App\Http\Requests\LifeStyleStoreRequest;
use App\Http\Requests\LifeStyleUpdateRequest;
use App\Http\Resources\LifeStyleCollection;
use App\Http\Resources\LifeStyleResource;
use App\Models\LifeStyle;
use Illuminate\Http\Request;

class LifeStyleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\LifeStyleCollection
     */
    public function index(Request $request)
    {
        $lifeStyles = LifeStyle::all();

        return new LifeStyleCollection($lifeStyles);
    }

    /**
     * @param \App\Http\Requests\LifeStyleStoreRequest $request
     * @return \App\Http\Resources\LifeStyleResource
     */
    public function store(LifeStyleStoreRequest $request)
    {
        $lifeStyle = LifeStyle::create($request->validated());

        return new LifeStyleResource($lifeStyle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\LifeStyle $lifeStyle
     * @return \App\Http\Resources\LifeStyleResource
     */
    public function show(Request $request, $lifeStyleId)
    {
        $lifeStyle = LifeStyle::find($lifeStyleId);
        return new LifeStyleResource($lifeStyle);
    }

    /**
     * @param \App\Http\Requests\LifeStyleUpdateRequest $request
     * @param \App\Models\LifeStyle $lifeStyle
     * @return \App\Http\Resources\LifeStyleResource
     */
    public function update(LifeStyleUpdateRequest $request, $lifeStyleId)
    {
        $lifeStyle = LifeStyle::find($lifeStyleId);
        $lifeStyle->update($request->validated());
        return new LifeStyleResource($lifeStyle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\LifeStyle $lifeStyle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $lifeStyleId)
    {
        $lifeStyle = LifeStyle::find($lifeStyleId);
        $lifeStyle->delete();
        return response()->noContent();
    }
}
