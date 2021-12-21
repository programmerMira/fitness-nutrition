<?php

namespace App\Http\Controllers;

use App\Http\Requests\DaysStoreRequest;
use App\Http\Requests\DaysUpdateRequest;
use App\Http\Resources\DayCollection;
use App\Http\Resources\DayResource;
use App\Models\Days;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    public function index(Request $request)
    {
        $days = Day::all()::with('training');
        return response()->json($days);
    }

    public function store(DaysStoreRequest $request)
    {
        $day = Day::create($request->validated());
        return response()->json($day);
    }

    public function show(Request $request, $dayID)
    {
        $day = Day::find($dayID);
        $day = $day::with('training');
        return response()->json($day);
    }

    public function update(DaysUpdateRequest $request, $dayID)
    {
        $day = Day::find($dayID);
        $day->update($request->validated());
        $day = $day::with('training');
        return response()->noContent();
    }

    public function destroy(Request $request, $dayID)
    {
        $day = Day::find($dayID);
        $day->delete();
        return response()->noContent();
    }
}
