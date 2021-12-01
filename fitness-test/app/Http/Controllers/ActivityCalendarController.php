<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityCalendarStoreRequest;
use App\Http\Requests\ActivityCalendarUpdateRequest;
use App\Http\Resources\ActivityCalendarCollection;
use App\Http\Resources\ActivityCalendarResource;
use App\Models\ActivityCalendar;
use Illuminate\Http\Request;

class ActivityCalendarController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ActivityCalendarCollection
     */
    public function index(Request $request)
    {
        $activityCalendars = ActivityCalendar::all();

        return new ActivityCalendarCollection($activityCalendars);
    }

    /**
     * @param \App\Http\Requests\ActivityCalendarStoreRequest $request
     * @return \App\Http\Resources\ActivityCalendarResource
     */
    public function store(ActivityCalendarStoreRequest $request)
    {
        $activityCalendar = ActivityCalendar::create($request->validated());

        return new ActivityCalendarResource($activityCalendar);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ActivityCalendar $activityCalendar
     * @return \App\Http\Resources\ActivityCalendarResource
     */
    public function show(Request $request, ActivityCalendar $activityCalendar)
    {
        return new ActivityCalendarResource($activityCalendar);
    }

    /**
     * @param \App\Http\Requests\ActivityCalendarUpdateRequest $request
     * @param \App\Models\ActivityCalendar $activityCalendar
     * @return \App\Http\Resources\ActivityCalendarResource
     */
    public function update(ActivityCalendarUpdateRequest $request, ActivityCalendar $activityCalendar)
    {
        $activityCalendar->update($request->validated());

        return new ActivityCalendarResource($activityCalendar);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ActivityCalendar $activityCalendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ActivityCalendar $activityCalendar)
    {
        $activityCalendar->delete();

        return response()->noContent();
    }
}
