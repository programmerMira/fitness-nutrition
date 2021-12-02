<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuCaloryStoreRequest;
use App\Http\Requests\MenuCaloryUpdateRequest;
use App\Http\Resources\MenuCaloryCollection;
use App\Http\Resources\MenuCaloryResource;
use App\Models\MenuCalory;
use Illuminate\Http\Request;

class MenuCaloryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\MenuCaloryCollection
     */
    public function index(Request $request)
    {
        $menuCalories = MenuCalory::all();

        return new MenuCaloryCollection($menuCalories);
    }

    /**
     * @param \App\Http\Requests\MenuCaloryStoreRequest $request
     * @return \App\Http\Resources\MenuCaloryResource
     */
    public function store(MenuCaloryStoreRequest $request)
    {
        $menuCalory = MenuCalory::create($request->validated());

        return new MenuCaloryResource($menuCalory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MenuCalory $menuCalory
     * @return \App\Http\Resources\MenuCaloryResource
     */
    public function show(Request $request, $menuCaloryId)
    {
        $menuCalory = MenuCalory::find($menuCaloryId);
        return new MenuCaloryResource($menuCalory);
    }

    /**
     * @param \App\Http\Requests\MenuCaloryUpdateRequest $request
     * @param \App\Models\MenuCalory $menuCalory
     * @return \App\Http\Resources\MenuCaloryResource
     */
    public function update(MenuCaloryUpdateRequest $request, $menuCaloryId)
    {
        $menuCalory = MenuCalory::find($menuCaloryId);
        $menuCalory->update($request->validated());
        return new MenuCaloryResource($menuCalory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MenuCalory $menuCalory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $menuCaloryId)
    {
        $menuCalory = MenuCalory::find($menuCaloryId);
        $menuCalory->delete();
        return response()->noContent();
    }
}
