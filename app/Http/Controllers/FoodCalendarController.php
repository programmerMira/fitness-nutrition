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
        $menu_user = UserMenu::where('user_id','=',$user)->with('menu')->get();
        $foodCalendars=[];
        foreach($menu_user as $tr_u){
            $tmp = FoodCalendar::where('users_menus_id','=',$tr_u->id)->with('usersMenus')->get();
            if(sizeof($tmp)>0){
                $tmp['userMenu'] = $tr_u;
                array_push($foodCalendars, $tmp);
            }
        }
        $fin_arr=[];
        foreach($foodCalendars as $act_cal){
            foreach($act_cal as $item){
                array_push($fin_arr, $item);
            }
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
