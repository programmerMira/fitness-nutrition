<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalAccountStoreRequest;
use App\Http\Requests\PersonalAccountUpdateRequest;
use App\Http\Resources\PersonalAccountCollection;
use App\Http\Resources\PersonalAccountResource;
use App\Models\PersonalAccount;
use Illuminate\Http\Request;

class PersonalAccountController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\PersonalAccountCollection
     */
    public function index(Request $request)
    {
        $personalAccounts = PersonalAccount::all();

        return new PersonalAccountCollection($personalAccounts);
    }

    /**
     * @param \App\Http\Requests\PersonalAccountStoreRequest $request
     * @return \App\Http\Resources\PersonalAccountResource
     */
    public function store(PersonalAccountStoreRequest $request)
    {
        $personalAccount = PersonalAccount::create($request->validated());

        return new PersonalAccountResource($personalAccount);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PersonalAccount $personalAccount
     * @return \App\Http\Resources\PersonalAccountResource
     */
    public function show(Request $request, PersonalAccount $personalAccount)
    {
        return new PersonalAccountResource($personalAccount);
    }

    /**
     * @param \App\Http\Requests\PersonalAccountUpdateRequest $request
     * @param \App\Models\PersonalAccount $personalAccount
     * @return \App\Http\Resources\PersonalAccountResource
     */
    public function update(PersonalAccountUpdateRequest $request, PersonalAccount $personalAccount)
    {
        $personalAccount->update($request->validated());

        return new PersonalAccountResource($personalAccount);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PersonalAccount $personalAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PersonalAccount $personalAccount)
    {
        $personalAccount->delete();

        return response()->noContent();
    }
}
