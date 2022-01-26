@extends('admin.dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-8">
                    <div class="nav-tabs-boxed" id="app">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#workout" role="tab" aria-controls="workout">Есть тренировка</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#weekend" role="tab" aria-controls="weekend">Выходной</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="workout" role="tabpanel">
                                <div class="card">
                                    <div class="card-header"><strong>
                                            Редактирование
                                        </strong></div>
                                    <div class="card-body">
                                        <form class="form-horizontal form" action="{{route('editTrainingDay',['id'=>$training_day->id])}}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Название</label>
                                                <div class="col-md-9">
                                                    <input value="{{ $training_day->name }}" name="name" class="form-control" type="text" placeholder="Название ">
                                                </div>
                                            </div>
{{--                                            @dd($training_day->videos)--}}
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Место:</label>
                                                <div class="col-md-9">
                                                    <select name="trainingLocation" class="form-control">
                                                        <option
                                                            value="{{$training_day->trainingLocation}}">{{$training_day->trainingLocation->name}}</option>
                                                        @foreach($locations as $location)
                                                            <option
                                                                value="{{$location->id}}">{{$location->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <Todolistvideo
                                                :videos="{{json_encode($training_day->videos)}}"
                                            ></Todolistvideo>
                                            <Todolistinfo
                                                :infos="{{json_encode($training_day->info)}}"
                                            ></Todolistinfo>
                                            <div class="card-footer card-footer-edit">
                                                <button class="btn btn-sm btn-primary" type="submit"> Сохранить</button>
                                                <a class="btn btn-sm btn-danger" href="/admin/workout"> Назад</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="weekend" role="tabpanel">
                                <div class="card">
                                    <div class="card-header"><strong>Для груди и рук</strong></div>
                                    <div class="card-body">
                                        <form class="form-horizontal form" action="{{route('editTrainingDay',['id'=>$training_day->id])}}" method="post">
                                            @csrf
                                            <Workouttodolist
                                                :infos="{{json_encode($training_day->info)}}"
                                            ></Workouttodolist>
                                            <div class="card-footer card-footer-edit">
                                                <button class="btn btn-sm btn-primary" type="submit"> Сохранить</button>
                                                <a class="btn btn-sm btn-danger" href="/admin/workout"> Назад</a>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

