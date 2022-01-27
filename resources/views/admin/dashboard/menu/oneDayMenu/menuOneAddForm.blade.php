@extends('admin.dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="col-md-12">
                <form class="form-horizontal form" action="{{route('addMenuDay')}}" method="post">
                    @csrf
                    <div class="nav-tabs-boxed" id="app">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu" role="tab"
                                                    aria-controls="workout">Приёмы пищи</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="menu" role="tabpanel">
                                <div class="card">
                                    <div class="card-header"><strong>
                                            Редактирование
                                        </strong></div>
                                    <div class="card-body">
                                        <Todolistmenu :contents="{{json_encode($menu_day->content)}}"></Todolistmenu>
                                        <Todolistinfo :infos="{{json_encode($menu_day->info)}}"></Todolistinfo>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Описание дня</label>
                                            <div class="col-md-9">
                                                <input name="description" class="form-control" type="text" placeholder="Название ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit"> Сохранить</button>
                        <a class="btn btn-sm btn-danger" href="/admin/menu"> Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


