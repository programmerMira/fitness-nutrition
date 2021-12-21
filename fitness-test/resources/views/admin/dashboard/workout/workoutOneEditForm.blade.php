@extends('admin.dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-8">
                    <div class="nav-tabs-boxed">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#workout" role="tab" aria-controls="workout">Есть тренировка</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#weekend" role="tab" aria-controls="weekend">Выходной</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="workout" role="tabpanel">
                                <div class="card">
                                    <div class="card-header"><strong>Для груди и рук</strong></div>
                                    <div class="card-body">
                                        <form class="form-horizontal form" action="" method="post">
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="hf-email">Название</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="hf-email" type="email" placeholder="Название " autocomplete="email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="hf-email">Ссылка на видео</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="hf-email" type="email" placeholder="Ссылка на видео" autocomplete="email">
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
                            <div class="tab-pane" id="weekend" role="tabpanel">
                                <div class="card">
                                    <div class="card-header"><strong>Для груди и рук</strong></div>
                                    <div class="card-body">
                                        <form class="form-horizontal form" action="" method="post">
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="hf-email">Сообщение</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="hf-email" type="email" placeholder="Сообщение" autocomplete="email">
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
                </div>
            </div>
        </div>

@endsection

@section('javascript')

@endsection
