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
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\UserMenuCollection
     */
    public function index(Request $request)
    {
        $userMenus = UserMenu::all();

        return new UserMenuCollection($userMenus);
    }

    /**
     * @param \App\Http\Requests\UserMenuStoreRequest $request
     * @return \App\Http\Resources\UserMenuResource
     */
    public function store(UserMenuStoreRequest $request)
    {
        $userMenu = UserMenu::create($request->validated());

        return new UserMenuResource($userMenu);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserMenu $userMenu
     * @return \App\Http\Resources\UserMenuResource
     */
    public function show(Request $request, UserMenu $userMenu)
    {
        return new UserMenuResource($userMenu);
    }

    /**
     * @param \App\Http\Requests\UserMenuUpdateRequest $request
     * @param \App\Models\UserMenu $userMenu
     * @return \App\Http\Resources\UserMenuResource
     */
    public function update(UserMenuUpdateRequest $request, UserMenu $userMenu)
    {
        $userMenu->update($request->validated());

        return new UserMenuResource($userMenu);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserMenu $userMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserMenu $userMenu)
    {
        $userMenu->delete();

        return response()->noContent();
    }
}
