<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityCalendarStoreRequest;
use App\Http\Requests\ActivityCalendarUpdateRequest;
use App\Http\Resources\ActivityCalendarCollection;
use App\Http\Resources\ActivityCalendarResource;
use App\Models\ActivityCalendar;
use App\Models\TrainingUser;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ActivityCalendarController extends Controller
{
    /*
        Returns activityCalendars only for currently logged-in user
    */
    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $training_user = TrainingUser::where('user_id','=',$user);
        $activityCalendars = ActivityCalendar::where('training_user_id','=',$training_user);
        return new ActivityCalendarCollection($activityCalendars);
    }

    public function store(ActivityCalendarStoreRequest $request)
    {
        $activityCalendar = ActivityCalendar::create($request->validated());
        return new ActivityCalendarResource($activityCalendar);
    }

    public function show(Request $request, $activityCalendarId)
    {
        $user = Auth::user()->id;
        $training_user = TrainingUser::where('user_id','=',$user);
        foreach($training_user as $item){
            if($item->id == $activityCalendarId){
                $activityCalendar = ActivityCalendar::find($activityCalendarId);
                return new ActivityCalendarResource($activityCalendar);
            }
        }
        return new ActivityCalendarResource();
    }

    public function update(ActivityCalendarUpdateRequest $request, $activityCalendarId)
    {
        $user = Auth::user()->id;
        $training_user = TrainingUser::where('user_id','=',$user);
        foreach($training_user as $item){
            if($item->id == $activityCalendarId){
                $activityCalendar->update($request->validated());
                return new ActivityCalendarResource($activityCalendar);
            }
        }
        return new ActivityCalendarResource();
    }

    public function destroy(Request $request, $activityCalendarId)
    {
        $user = Auth::user()->id;
        $training_user = TrainingUser::where('user_id','=',$user);
        foreach($training_user as $item){
            if($item->id == $activityCalendarId){
                $activityCalendar->delete();
                return response()->noContent();
            }
        }
        return response()->noContent();
    }
}
