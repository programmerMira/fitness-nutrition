<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodCalendarStoreRequest;
use App\Http\Requests\FoodCalendarUpdateRequest;
use App\Http\Resources\FoodCalendarCollection;
use App\Http\Resources\FoodCalendarResource;
use App\Models\FoodCalendar;
use Illuminate\Http\Request;

class FoodCalendarController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\FoodCalendarCollection
     */
    public function index(Request $request)
    {
        $foodCalendars = FoodCalendar::all();

        return new FoodCalendarCollection($foodCalendars);
    }

    /**
     * @param \App\Http\Requests\FoodCalendarStoreRequest $request
     * @return \App\Http\Resources\FoodCalendarResource
     */
    public function store(FoodCalendarStoreRequest $request)
    {
        $foodCalendar = FoodCalendar::create($request->validated());

        return new FoodCalendarResource($foodCalendar);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FoodCalendar $foodCalendar
     * @return \App\Http\Resources\FoodCalendarResource
     */
    public function show(Request $request, FoodCalendar $foodCalendar)
    {
        return new FoodCalendarResource($foodCalendar);
    }

    /**
     * @param \App\Http\Requests\FoodCalendarUpdateRequest $request
     * @param \App\Models\FoodCalendar $foodCalendar
     * @return \App\Http\Resources\FoodCalendarResource
     */
    public function update(FoodCalendarUpdateRequest $request, FoodCalendar $foodCalendar)
    {
        $foodCalendar->update($request->validated());

        return new FoodCalendarResource($foodCalendar);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FoodCalendar $foodCalendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FoodCalendar $foodCalendar)
    {
        $foodCalendar->delete();

        return response()->noContent();
    }
}
