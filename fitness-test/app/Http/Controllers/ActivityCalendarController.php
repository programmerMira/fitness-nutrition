<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityCalendarStoreRequest;
use App\Http\Requests\ActivityCalendarUpdateRequest;
use App\Http\Resources\ActivityCalendarCollection;
use App\Http\Resources\ActivityCalendarResource;
use App\Models\ActivityCalendar;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ActivityCalendarController extends Controller
{
    public function index(Request $request)
    {
        //$user = Auth::user()->name;
        //dd($user);
        $activityCalendars = ActivityCalendar::all();
        return new ActivityCalendarCollection($activityCalendars);
    }

    public function store(ActivityCalendarStoreRequest $request)
    {
        $activityCalendar = ActivityCalendar::create($request->validated());

        return new ActivityCalendarResource($activityCalendar);
    }

    public function show(Request $request, $activityCalendarId)
    {
        $activityCalendar = ActivityCalendar::find($activityCalendarId);
        return new ActivityCalendarResource($activityCalendar);
    }

    public function update(ActivityCalendarUpdateRequest $request, $activityCalendarId)
    {
        $activityCalendar = ActivityCalendar::find($activityCalendarId);
        $activityCalendar->update($request->validated());
        return new ActivityCalendarResource($activityCalendar);
    }

    public function destroy(Request $request, $activityCalendarId)
    {
        $activityCalendar = ActivityCalendar::find($activityCalendarId);
        $activityCalendar->delete();
        return response()->noContent();
    }
}
