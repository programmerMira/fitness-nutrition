@extends('admin.dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>{{ __('Users') }}</div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <th>ФИО</th>
                                    <th>E-mail</th>
                                    <th>Возраст</th>
                                    <th>Покупки</th>
                                    <th>Сообщения</th>
                                    <th>Начало/окончание</th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($accounts)
                                    @foreach($accounts as $account)
                                        <tr>
                                            <td>{{$account->user->name}}</td>
                                            <td>{{$account->user->email}}</td>
                                            <td>{{$account->age}}</td>
                                            <td>
                                                @foreach( $user_menus as $user_menu)
                                                    @if($account->user_id == $user_menu->user_id)
                                                        {{ $user_menu->menu->menu_content }}
                                                        ({{$user_menu->menu->menu_price}}руб),
                                                    @endif
                                                @endforeach
                                                @foreach( $user_trainings as $user_training)
                                                    @if($account->user_id == $user_training->user_id)
                                                        Уровень тренировки {{ $user_training->training->level }}
                                                        ({{$user_training->training->training_price}}руб),
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>Как пользоваться лк?</td>
                                            <td>Как пользоваться лк?</td>
                                        </tr>
                                    @endforeach
                                @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection

