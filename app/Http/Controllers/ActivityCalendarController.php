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
    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $training_user = TrainingUser::where('user_id','=',$user)->with('training')->get();
        $activityCalendars=[];
        foreach($training_user as $tr_u){
            $tmp = ActivityCalendar::where('training_user_id','=',$tr_u->id)->with('trainingUser')->get();
            if(sizeof($tmp)>0){
                //$tmp['trainingUser'] = $tr_u;
                array_push($activityCalendars, $tmp);
            }
        }
        $fin_arr=[];
        foreach($activityCalendars as $act_cal){
            foreach($act_cal as $item){
                array_push($fin_arr, $item);
            }
        }
        return response()->json($fin_arr);
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
                return response()->json($activityCalendar);
            }
        }
        return response()->noContent();
    }

    public function update(ActivityCalendarUpdateRequest $request, $activityCalendarId)
    {
        $activityCalendar = ActivityCalendar::find($activityCalendarId);
        $activityCalendar->update($request->validated());
        return response()->noContent();
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
