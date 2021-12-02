<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserMenuStoreRequest;
use App\Http\Requests\UserMenuUpdateRequest;
use App\Http\Resources\UserMenuCollection;
use App\Http\Resources\UserMenuResource;
use App\Models\UserMenu;
use Illuminate\Http\Request;

class UserMenuController extends Controller
{
    public function index(Request $request)
    {
        $userMenus = UserMenu::all();

        return new UserMenuCollection($userMenus);
    }

    public function store(UserMenuStoreRequest $request)
    {
        $userMenu = UserMenu::create($request->validated());

        return new UserMenuResource($userMenu);
    }

    public function show(Request $request, $userMenuId)
    {
        $userMenu = UserMenu::find($userMenuId);
        return new UserMenuResource($userMenu);
    }

    public function update(UserMenuUpdateRequest $request, $userMenuId)
    {
        $userMenu = UserMenu::find($userMenuId);
        $userMenu->update($request->validated());
        return new UserMenuResource($userMenu);
    }

    public function destroy(Request $request, $userMenuId)
    {
        $userMenu = UserMenu::find($userMenuId);
        $userMenu->delete();
        return response()->noContent();
    }
}
