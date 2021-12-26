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
    public function index(Request $request)
    {
        $menuTypes = MenuType::all();

        return new MenuTypeCollection($menuTypes);
    }

    public function store(MenuTypeStoreRequest $request)
    {
        $menuType = MenuType::create($request->validated());

        return new MenuTypeResource($menuType);
    }

    public function show(Request $request, $menuTypeId)
    {
        $menuType = MenuType::find($menuTypeId);
        return new MenuTypeResource($menuType);
    }

    public function update(MenuTypeUpdateRequest $request, $menuTypeId)
    {
        $menuType = MenuType::find($menuTypeId);
        $menuType->update($request->validated());
        return new MenuTypeResource($menuType);
    }

    public function destroy(Request $request, $menuTypeId)
    {
        $menuType = MenuType::find($menuTypeId);
        $menuType->delete();
        return response()->noContent();
    }
}
