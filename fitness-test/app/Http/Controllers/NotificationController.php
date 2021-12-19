<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationStoreRequest;
use App\Http\Requests\NotificationUpdateRequest;
use App\Http\Resources\NotificationCollection;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $notifications = Notification::where('user_id','=',$user)->get();
        return response()->json($notifications);
    }

    public function store(NotificationStoreRequest $request)
    {
        $notification = Notification::create($request->validated());
        return new NotificationResource($notification);
    }

    public function show(Request $request, $notificationId)
    {
        $user = Auth::user()->id;
        $notification = Notification::find($notificationId);
        if($notification->user_id==$user)
            return new NotificationResource($notification);
        return new NotificationResource();
    }

    public function update(NotificationUpdateRequest $request, $notificationId)
    {
        $user = Auth::user()->id;
        $notification = Notification::find($notificationId);
        if($notification->user_id==$user)
        {
            $notification->update($request->validated());
            return new NotificationResource($notification);
        }
        return new NotificationResource();   
    }

    public function destroy(Request $request, $notificationId)
    {
        $user = Auth::user()->id;
        $notification = Notification::find($notificationId);
        if($notification->user_id==$user)
            $notification->delete();
        return response()->noContent();
    }
}
