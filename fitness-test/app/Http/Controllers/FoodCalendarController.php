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
        $menu_user = UserMenu::where('user_id','=',$user);
        $foodCalendars = FoodCalendar::where('users_menus_id','=',$menu_user);
        return new FoodCalendarCollection($foodCalendars);
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
        $user = Auth::user()->id;
        $menu_user = UserMenu::where('user_id','=',$user);
        foreach($menu_user as $item){
            if($item->id == $foodCalendarId){
                $foodCalendar->update($request->validated());
                return new ActivityCalendarResource($foodCalendar);
            }
        }
        return new FoodCalendarResource();
    }

    public function destroy(Request $request, $foodCalendarId)
    {
        $user = Auth::user()->id;
        $menu_user = UserMenu::where('user_id','=',$user);
        foreach($menu_user as $item){
            if($item->id == $foodCalendarId){
                $foodCalendar->delete();
                return new ActivityCalendarResource($foodCalendar);
            }
        }
        return new FoodCalendarResource();
    }
}
