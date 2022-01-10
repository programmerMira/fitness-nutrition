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
        $notifications = Notification::where('user_id', '=', $user)->get();
        return response()->json($notifications);


    }
    public function list()
    {
        $notifications = Notification::all();

        return view('admin.dashboard.notification.notificationList')->with(compact('notifications'));
    }

    public function create(NotificationStoreRequest $request)
    {
        return view('admin.dashboard.notification.notificationAdd');
    }

    public function edit($id)
    {
        $notification = Notification::find($id);

        return view('admin.dashboard.notification.notificationEditForm', compact('notification'));
    }

    public function upgrade(NotificationStoreRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:300',
        ]);

        $notification = Notification::find($id);

        $notification -> name = $request->get('name');
        $notification -> description = $request->get('description');

        $notification -> save();

        return redirect('admin.dashboard.notification.notificationList')->with('success', 'Edit!');
    }
    public function store(NotificationStoreRequest $request)
    {
        $notification = Notification::create($request->validated());
        return new NotificationResource($notification);

        $validate = $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:300',
        ]);

        if ($validate->fails()) {
            return route('notification.create')
                ->withErrors($validate);
        }

        $notification = new Notification([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        $notification->save();

        return redirect('notification')->with('success', 'Saved!');

    }

    public function show(Request $request, $notificationId)
    {
        $user = Auth::user()->id;
        $notification = Notification::find($notificationId);
        if ($notification->user_id == $user)
            return new NotificationResource($notification);
        return new NotificationResource();
    }

    public function update(NotificationUpdateRequest $request, $notificationId)
    {
        $user = Auth::user()->id;
        $notification = Notification::find($notificationId);
        if ($notification->user_id == $user) {
            $notification->update($request->validated());
            return new NotificationResource($notification);
        }
        return new NotificationResource();
    }

    public function destroy(Request $request, $notificationId)
    {
        $user = Auth::user()->id;
        $notification = Notification::find($notificationId);
        if ($notification->user_id == $user)
            $notification->delete();
        return response()->noContent();

        $notification = Notification::find($id);

        $notification->delete();

        return redirect()->route('admin.dashboard.notification.notificationList')
            ->with('success', 'Deleted successfully');
    }

}
