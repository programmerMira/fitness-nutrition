<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingStoreRequest;
use App\Http\Requests\TrainingUpdateRequest;
use App\Http\Resources\TrainingCollection;
use App\Http\Resources\TrainingResource;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\TrainingLocation;
use App\Models\TrainingUser;

class TrainingController extends Controller
{
    public function index(Request $request, $id)
    {
        $trainings = Training::all();
        return new TrainingCollection($trainings);

    }

    public function store(TrainingStoreRequest $request)
    {
        $training = Training::create($request->validated());

        return new TrainingResource($training);
    }

    public function show(Request $request, $trainingId)
    {
        $training = Training::find($trainingId);
        return new TrainingResource($training);
    }

    public function update(TrainingUpdateRequest $request, $trainingId)
    {
        $training = Training::find($trainingId);
        $training->update($request->validated());
        return new TrainingResource($training);
    }

    public function destroy(Request $request, $trainingId)
    {
        $training = Training::find($trainingId);
        $training->delete();
        return response()->noContent();
    }

    function adminTrainings(Request $request)
    {
        $trainings = Training::with('trainingLocation', 'trainingDays')->get();
        $locations = TrainingLocation::all();

        return view('admin.dashboard.workout.workoutList')->with(compact('trainings', 'locations'));
    }

    function adminShowTraining(Request $request, $id)
    {
        $training = Training::find($id);
        $locations = TrainingLocation::all();
        return view('admin.dashboard.workout.workoutEditForm')->with(compact('training', 'locations'));
    }

    function adminEditTraining(Request $request, $id)
    {
        $name = $request->name;
        $training_price = $request->training_price;
        $trainingLocation = $request->trainingLocation;

        if ($name != null && $training_price != null && $trainingLocation != null) {
            Training::whereId($id)->update([
                'name' => $name,
                'training_price' => $training_price,
                'trainingLocation' => $trainingLocation
            ]);
        }
        return redirect()->route('training');
    }

    function adminAddView(Request $request)
    {
        $locations = TrainingLocation::all();
        return view('admin.dashboard.workout.workoutAddForm')->with(compact('locations'));
    }

    function adminAddTraining(Request $request)
    {
        $name = $request->name;
        $training_price = $request->training_price;
        $trainingLocation = $request->trainingLocation;

        if ($name != null && $training_price != null && $trainingLocation != null) {
            Training::create([
                'name' => $name,
                'training_price' => $training_price,
                'trainingLocation' => $trainingLocation
            ]);
        }
        return redirect()->route('training');
    }

    //function adminDeleteTraining(Request $request, $id)
    //{
    //    $training = Training::where('id', '=', $id);
    //    $training->steps->delete();
    //    $training->delete();
    //    return redirect()->route('training');
    //}

    function adminDeleteTraining(Request $request, $id)
    {
        //Training::where('id', '=', $id)->delete();

        $training = Training::where('id', '=', $id);
        $training_users = TrainingUser::where('id', '=', $id);
        $training->trainingUser()->delete();
        return redirect()->route('training');
    }

    function adminTrainingsDay(Request $request)
    {
        $trainings = Training::with('trainingLocation', 'trainingDays')->get();
        $locations = TrainingLocation::all();

        return view('admin.dashboard.workout.oneDayTraining.workoutShow')->with(compact('trainings', 'locations'));
    }

}
