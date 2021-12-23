@extends('admin.dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header"><strong>Меню №1</strong></div>
                <div class="card-body">
                    <div id="app">
                        <Todolist></Todolist>
                    </div>
                    <div class="card-footer footer-edit card-footer-edit">
                        <button class="btn btn-sm btn-primary" type="submit"> Сохранить</button>
                        <button class="btn btn-sm btn-danger" type="reset"> Назад</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


