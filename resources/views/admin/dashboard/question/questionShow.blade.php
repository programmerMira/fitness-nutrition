@extends('admin.dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> User Liza</div>
                        <div class="card-body">
                            <h5><b>Заголовок</b><br>{{$article->name}}</h5>
                            <h5><b>Текст:</b><br>{!!$article->answer!!}</h5>
                            <a href="/admin/question" class="btn btn-block btn-primary">Назад</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection
