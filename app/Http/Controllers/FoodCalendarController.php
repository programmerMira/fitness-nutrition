<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodCalendarStoreRequest;
use App\Http\Requests\FoodCalendarUpdateRequest;
use App\Http\Resources\FoodCalendarCollection;
use App\Http\Resources\FoodCalendarResource;
use App\Models\FoodCalendar;
use Illuminate\Http\Request;
use App\Models\UserMenu;

use Illuminate\Support\Facades\Auth;

class FoodCalendarController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $foodCalendars=FoodCalendar::with('usersMenus')->get();
        $fin_arr = [];
        foreach($foodCalendars as $item){
            if($item->usersMenus->user_id == $user)
                array_push($fin_arr, $item);
        }
        return response()->json($fin_arr);
    }

    public function store(FoodCalendarStoreRequest $request)
    {
        $foodCalendar = FoodCalendar::create($request->validated());
        return new FoodCalendarResource($foodCalendar);
    }

    public function show(Request $request, $foodCalendarId)
    {
        $user = Auth::user()->id;
        $menu_user = UserMenu::where('user_id','=',$user);
        foreach($menu_user as $item){
            if($item->id == $foodCalendarId){
                $foodCalendar = ActivityCalendar::find($foodCalendarId);
                return new ActivityCalendarResource($foodCalendar);
            }
        }
        return new FoodCalendarResource();
    }

    public function update(FoodCalendarUpdateRequest $request, $foodCalendarId)
    {
        $foodCalendar = FoodCalendar::find($foodCalendarId);
        $foodCalendar->update($request->validated());
        return response()->noContent();
    }

    public function destroy(Request $request, $foodCalendarId)
    {
        $user = Auth::user()->id;
        $menu_user = UserMenu::where('user_id','=',$user);
        foreach($menu_user as $item){
            if($item->id == $foodCalendarId){
                $foodCalendar->delete();
            }
        }
        return response()->noContent();
    }
}
