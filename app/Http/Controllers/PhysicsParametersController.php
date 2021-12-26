<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhysicsParameterStoreRequest;
use App\Http\Requests\PhysicsParameterUpdateRequest;
use App\Http\Resources\PhysicsParameterCollection;
use App\Http\Resources\PhysicsParameterResource;
use App\Models\PhysicsParameters;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PhysicsParametersController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $physicsParameters = PhysicsParameters::where('user_id','=',$user)->first();
        return response()->json($physicsParameters);
    }

    public function store(PhysicsParameterStoreRequest $request)
    {
        $physicsParameter = PhysicsParameters::create($request->validated());
        return new PhysicsParameterResource($physicsParameter);
    }

    public function show(Request $request, $physicsParameterID)
    {
        $user = Auth::user()->id;
        $physicsParameters = PhysicsParameter::find($physicsParameterID);
        if($physicsParameters->user_id==$user)
            return new PhysicsParameterResource($notification);
        return new PhysicsParameterResource();
    }

    public function update(PhysicsParameterUpdateRequest $request, $physicsParameterID)
    {
        $user = Auth::user()->id;
        $physicsParameters = PhysicsParameters::find($physicsParameterID);
        if($physicsParameters->user_id==$user)
        {
            $physicsParameters->update($request->validated());
        }
        return response()->noContent();
    }

    public function destroy(Request $request, $physicsParameterID)
    {
        $user = Auth::user()->id;
        $physicsParameters = PhysicsParameters::find($physicsParameterID);
        if($physicsParameters->user_id==$user)
            $physicsParameter->delete();
        return response()->noContent();
    }
}
