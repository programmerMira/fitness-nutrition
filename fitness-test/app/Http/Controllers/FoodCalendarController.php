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
    public function index(Request $request)
    {
        $foodCalendars = FoodCalendar::all();

        return new FoodCalendarCollection($foodCalendars);
    }

    public function store(FoodCalendarStoreRequest $request)
    {
        $foodCalendar = FoodCalendar::create($request->validated());

        return new FoodCalendarResource($foodCalendar);
    }

    public function show(Request $request, $foodCalendarId)
    {
        $foodCalendar = FoodCalendar($foodCalendarId);
        return new FoodCalendarResource($foodCalendar);
    }

    public function update(FoodCalendarUpdateRequest $request, $foodCalendarId)
    {
        $foodCalendar = FoodCalendar($foodCalendarId);
        $foodCalendar->update($request->validated());
        return new FoodCalendarResource($foodCalendar);
    }

    public function destroy(Request $request, $foodCalendarId)
    {
        $foodCalendar = FoodCalendar($foodCalendarId);
        $foodCalendar->delete();
        return response()->noContent();
    }
}
