<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuStoreRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Http\Resources\MenuCollection;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menus = Menu::all();

        return new MenuCollection($menus);
    }

    public function store(MenuStoreRequest $request)
    {
        $menu = Menu::create($request->validated());

        return new MenuResource($menu);
    }

    public function show(Request $request, $menuId)
    {
        $menu = Menu::find($menuId);
        return new MenuResource($menu);
    }

    public function update(MenuUpdateRequest $request, $menuId)
    {
        $menu = Menu::find($menuId);
        $menu->update($request->validated());
        return new MenuResource($menu);
    }

    public function destroy(Request $request, $menuId)
    {
        $menu = Menu::find($menuId);
        $menu->delete();
        return response()->noContent();
    }
}
