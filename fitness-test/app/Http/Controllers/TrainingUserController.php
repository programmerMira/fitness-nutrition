<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingUserStoreRequest;
use App\Http\Requests\TrainingUserUpdateRequest;
use App\Http\Resources\TrainingUserCollection;
use App\Http\Resources\TrainingUserResource;
use App\Models\TrainingUser;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TrainingUserController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $trainingsUser = TrainingUser::where('user_id','=',$user);
        return new TrainingUserCollection($trainingsUser);
    }

    public function store(TrainingUserStoreRequest $request)
    {
        $trainingUser = TrainingUser::create($request->validated());
        return new TrainingUserResource($trainingUser);
    }

    public function show(Request $request, $trainingUserId)
    {
        $user = Auth::user()->id;
        $trainingsUser = TrainingUser::where('user_id','=',$user);
        foreach($trainingsUser as $item){
            if($item->id == $trainingUserId){
                return new TrainingUserResource($item);
            }
        }
        return new TrainingUserResource();
    }

    public function update(TrainingUserUpdateRequest $request, $trainingUserId)
    {
        $user = Auth::user()->id;
        $trainingsUser = TrainingUser::where('user_id','=',$user);
        foreach($trainingsUser as $item){
            if($item->id == $trainingUserId){
                $item->update($request->validated());
                return new TrainingUserResource($item);
            }
        }
        return new TrainingUserResource();
    }

    public function destroy(Request $request, $trainingUserId)
    {
        $user = Auth::user()->id;
        $trainingsUser = TrainingUser::where('user_id','=',$user);
        foreach($trainingsUser as $item){
            if($item->id == $trainingUserId){
                $item->delete();
                return response()->noContent();
            }
        }
        return response()->noContent();
    }
}
