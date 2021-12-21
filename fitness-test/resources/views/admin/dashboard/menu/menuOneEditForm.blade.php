@extends('admin.dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><strong>Меню №1</strong></div>
                        <div class="card-body">
                            <div id="app">
                                <TodoList></TodoList>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

        @section('javascript')
            <script src="{{ asset('js/admin/admin-app.js') }}"></script>
@endsection
