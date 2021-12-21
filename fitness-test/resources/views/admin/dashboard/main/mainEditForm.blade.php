@extends('admin.dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><strong>Марафон №1</strong></div>
                        <div class="card-body">
                            <form class="form-horizontal" action="" method="post">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="hf-email">Окончание акции:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="hf-email" type="email" autocomplete="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="hf-email">Цена без скидки:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="hf-email" type="email" autocomplete="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="hf-email">Цена со скидкой:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="hf-email" type="email" autocomplete="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="hf-email">Количество дней:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="hf-email" type="email" autocomplete="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Меню:</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Выбрать...</option>
                                            <option>Меню 1</option>
                                            <option>Меню 2</option>
                                            <option>Меню 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Тренировка:</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Выбрать...</option>
                                            <option>Тренировка на ноги</option>
                                            <option>Тренировка на руки</option>
                                            <option>Тренировка на спину</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="hf-email">Дополнительно о тренировках:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="hf-email" type="email" autocomplete="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="hf-email">Дополнительно о рационе:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="hf-email" type="email" autocomplete="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="hf-email">Дополнительно о процедурах:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="hf-email" type="email" autocomplete="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="hf-email">Дополнительно о поддержке:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="hf-email" type="email" autocomplete="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="hf-email">Дополнительно о мотивации:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="hf-email" type="email" autocomplete="email">
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
