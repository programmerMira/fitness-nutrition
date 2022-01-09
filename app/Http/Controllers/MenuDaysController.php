<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuDaysStoreRequest;
use App\Http\Requests\MenuDaysUpdateRequest;
use App\Http\Resources\MenuDayCollection;
use App\Http\Resources\MenuDayResource;
use App\Models\MenuDays;
use Illuminate\Http\Request;

class MenuDaysController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\MenuDayCollection
     */
    public function index(Request $request)
    {
        $menuDays = MenuDay::all();

        return new MenuDayCollection($menuDays);
    }

    /**
     * @param \App\Http\Requests\MenuDaysStoreRequest $request
     * @return \App\Http\Resources\MenuDayResource
     */
    public function store(MenuDaysStoreRequest $request)
    {
        $menuDay = MenuDay::create($request->validated());

        return new MenuDayResource($menuDay);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MenuDays $menuDay
     * @return \App\Http\Resources\MenuDayResource
     */
    public function show(Request $request, MenuDay $menuDay)
    {
        return new MenuDayResource($menuDay);
    }

    /**
     * @param \App\Http\Requests\MenuDaysUpdateRequest $request
     * @param \App\Models\MenuDays $menuDay
     * @return \App\Http\Resources\MenuDayResource
     */
    public function update(MenuDaysUpdateRequest $request, MenuDay $menuDay)
    {
        $menuDay->update($request->validated());

        return new MenuDayResource($menuDay);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MenuDays $menuDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MenuDay $menuDay)
    {
        $menuDay->delete();

        return response()->noContent();
    }
}
