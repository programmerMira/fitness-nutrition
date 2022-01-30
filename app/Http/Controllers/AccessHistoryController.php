<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessHistoryStoreRequest;
use App\Http\Requests\AccessHistoryUpdateRequest;
use App\Http\Resources\AccessHistoryCollection;
use App\Http\Resources\AccessHistoryResource;
use App\Models\AccessHistory;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AccessHistoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\AccessHistoryCollection
     */
    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $accessHistories = AccessHistory::where('user_id','=',$user)->first();

        return response()->json($accessHistories);
    }

    /**
     * @param \App\Http\Requests\AccessHistoryStoreRequest $request
     * @return \App\Http\Resources\AccessHistoryResource
     */
    public function store(AccessHistoryStoreRequest $request)
    {
        $accessHistory = AccessHistory::create($request->validated());

        return response()->json($accessHistory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AccessHistory $accessHistory
     * @return \App\Http\Resources\AccessHistoryResource
     */
    public function show(Request $request, $accessHistoryId)
    {
        $accessHistory = AccessHistory::find($accessHistoryId);
        return response()->json($accessHistory);
    }

    /**
     * @param \App\Http\Requests\AccessHistoryUpdateRequest $request
     * @param \App\Models\AccessHistory $accessHistory
     * @return \App\Http\Resources\AccessHistoryResource
     */
    public function update(AccessHistoryUpdateRequest $request, $accessHistoryId)
    {
        $accessHistory = AccessHistory::find($accessHistoryId);
        $accessHistory->update($request->validated());

        return response()->json($accessHistory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AccessHistory $accessHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $accessHistoryId)
    {
        $accessHistory = AccessHistory::find($accessHistoryId);
        $accessHistory->delete();

        return response()->noContent();
    }
}
