@extends('admin.dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><strong>Тренировка №1</strong></div>
                        <div class="card-body">
                            <form class="form-horizontal" action="" method="post">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Заголовок</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" placeholder="Заголовок ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Текст</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" placeholder="Текст">
                                    </div>
                                </div>
                                <div class="card-footer card-footer-edit">
                                    <button class="btn btn-sm btn-primary" type="submit"> Сохранить</button>
                                    <button class="btn btn-sm btn-danger" type="reset"> Назад</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('javascript')

@endsection
