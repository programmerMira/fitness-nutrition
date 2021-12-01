<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuTypeStoreRequest;
use App\Http\Requests\MenuTypeUpdateRequest;
use App\Http\Resources\MenuTypeCollection;
use App\Http\Resources\MenuTypeResource;
use App\Models\MenuType;
use Illuminate\Http\Request;

class MenuTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\MenuTypeCollection
     */
    public function index(Request $request)
    {
        $menuTypes = MenuType::all();

        return new MenuTypeCollection($menuTypes);
    }

    /**
     * @param \App\Http\Requests\MenuTypeStoreRequest $request
     * @return \App\Http\Resources\MenuTypeResource
     */
    public function store(MenuTypeStoreRequest $request)
    {
        $menuType = MenuType::create($request->validated());

        return new MenuTypeResource($menuType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MenuType $menuType
     * @return \App\Http\Resources\MenuTypeResource
     */
    public function show(Request $request, MenuType $menuType)
    {
        return new MenuTypeResource($menuType);
    }

    /**
     * @param \App\Http\Requests\MenuTypeUpdateRequest $request
     * @param \App\Models\MenuType $menuType
     * @return \App\Http\Resources\MenuTypeResource
     */
    public function update(MenuTypeUpdateRequest $request, MenuType $menuType)
    {
        $menuType->update($request->validated());

        return new MenuTypeResource($menuType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MenuType $menuType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MenuType $menuType)
    {
        $menuType->delete();

        return response()->noContent();
    }
}
