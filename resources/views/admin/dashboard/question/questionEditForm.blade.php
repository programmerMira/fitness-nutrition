@extends('admin.dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><strong>Вопрос</strong></div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{route('editArticle',['id'=>$article->id])}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Категория</label>
                                    <div class="col-md-9">
                                        <select name="topic_id" class="form-control form-select" aria-label="Категория">
                                            <option value="{{$article->topic_id}}">{{$topic->name}}</option>
                                            @foreach($topics as $topic)
                                            <option value="{{$topic->id}}">{{$topic->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Заголовок</label>
                                    <div class="col-md-9">
                                        <input name="name" class="form-control" type="text" value="{{$article->name}}" placeholder="Заголовок ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Текст</label>
                                    <div class="col-md-9">
                                        <textarea name="answer" class="form-control" type="text" placeholder="Текст">{{$article->answer}}</textarea>
                                    </div>
                                </div>
                                <div class="card-footer card-footer-edit">
                                    <button class="btn btn-sm btn-primary" type="submit"> Сохранить</button>
                                    <a class="btn btn-sm btn-danger" href="/admin/question"> Назад</a>
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
