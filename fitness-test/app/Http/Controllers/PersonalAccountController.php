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
    public function index(Request $request)
    {
        $personalAccounts = PersonalAccount::all();

        return new PersonalAccountCollection($personalAccounts);
    }

    public function store(PersonalAccountStoreRequest $request)
    {
        $personalAccount = PersonalAccount::create($request->validated());

        return new PersonalAccountResource($personalAccount);
    }

    public function show(Request $request, $personalAccountId)
    {
        $personalAccount = PersonalAccount::find($personalAccountId);
        return new PersonalAccountResource($personalAccount);
    }

    public function update(PersonalAccountUpdateRequest $request, $personalAccountId)
    {
        $personalAccount = PersonalAccount::find($personalAccountId);
        $personalAccount->update($request->validated());
        return new PersonalAccountResource($personalAccount);
    }

    public function destroy(Request $request, $personalAccountId)
    {
        $personalAccount = PersonalAccount::find($personalAccountId);
        $personalAccount->delete();
        return response()->noContent();
    }
}
