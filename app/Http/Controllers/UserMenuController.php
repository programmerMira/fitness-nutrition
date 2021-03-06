<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserMenuStoreRequest;
use App\Http\Requests\UserMenuUpdateRequest;
use App\Http\Resources\UserMenuCollection;
use App\Http\Resources\UserMenuResource;
use App\Models\UserMenu;
use App\Models\MenuDays;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserMenuController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $userMenus = UserMenu::where('user_id','=',$user)->with('menu')->with('menuType')->get();
        foreach($userMenus as $m_u)
        {
            $m_u->days = MenuDays::all()->where('menu_id','=',$m_u->menu_id);
        }
        return response()->json($userMenus);
    }

    public function store(UserMenuStoreRequest $request)
    {
        $userMenu = UserMenu::create($request->validated());

        return new UserMenuResource($userMenu);
    }

    public function show(Request $request, $userMenuId)
    {
        $user = Auth::user()->id;
        $userMenu = UserMenu::where('user_id','=',$user);
        foreach($userMenu as $item){
            if($item->id == $userMenuId){
                return new UserMenuResource($item);
            }
        }
        return new UserMenuResource();
    }

    public function update(UserMenuUpdateRequest $request, $userMenuId)
    {
        $user = Auth::user()->id;
        $userMenu = UserMenu::where('user_id','=',$user);
        foreach($userMenu as $item){
            if($item->id == $userMenuId){
                $item->update($request->validated());
                return new UserMenuResource($item);
            }
        }
        return new UserMenuResource();
    }

    public function destroy(Request $request, $userMenuId)
    {
        $user = Auth::user()->id;
        $userMenu = UserMenu::where('user_id','=',$user);
        foreach($userMenu as $item){
            if($item->id == $userMenuId){
                $item->delete();
                return response()->noContent();
            }
        }
        return response()->noContent();
    }


}
