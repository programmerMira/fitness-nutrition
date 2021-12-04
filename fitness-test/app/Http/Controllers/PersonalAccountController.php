<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalAccountStoreRequest;
use App\Http\Requests\PersonalAccountUpdateRequest;
use App\Http\Resources\PersonalAccountCollection;
use App\Http\Resources\PersonalAccountResource;
use App\Models\PersonalAccount;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PersonalAccountController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $personalAccount = PersonalAccount::where('user_id','=',$user);
        return new PersonalAccountCollection($personalAccount);
    }

    public function store(PersonalAccountStoreRequest $request)
    {
        $personalAccount = PersonalAccount::create($request->validated());
        return new PersonalAccountResource($personalAccount);
    }

    public function show(Request $request, $personalAccountId)
    {
        $user = Auth::user()->id;
        $personalAccount = PersonalAccount::where('user_id','=',$user);
        return new PersonalAccountCollection($personalAccount);
    }
    /*
        User can update their parameters once in 10 days
    */
    public function updateParameters(PersonalAccountUpdateRequest $request, $personalAccountId)
    {

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
