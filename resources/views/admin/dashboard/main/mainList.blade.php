@extends('admin.dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="row">
                    <div class="col-sm-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                ДОБРО ПОЖАЛОВАТЬ В<br>
                                <b>ФИТНЕС СЕМЬЮ</b>
                            </div>
                            <div class="card-body">
                                <div class="jumbotron">
                                    <p>
                                        В нашей фитнес-семье ты будешь вкусно питаться, с удовольствием заниматься
                                        спортом и, в первую очередь, любить себя! Этому мы и обучаем в наших программах
                                        и марафонах!
                                    </p>
                                </div>
                                <div class="card-footer card-footer-edit">
                                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                                            data-target="#welcome"> Изменить
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="welcome" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">ДОБРО ПОЖАЛОВАТЬ В
                                                <b>ФИТНЕС СЕМЬЮ</b>
                                            </h4>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                        </div>
                                        <form action="">
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label">Подзаголовок</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label">Заголовок</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label">Текст</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                                    Закрыть
                                                </button>
                                                <button class="btn btn-primary" type="button">Сохранить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                ТЕБЕ К НАМ, ЕСЛИ:
                            </div>
                            <div class="card-body">
                                <div class="jumbotron">
                                    <p>
                                        <b>01</b>
                                        Ты хочешь вкусно питаться без диет и голодовок!
                                    </p>
                                    <p>
                                        <b>02</b>
                                        Ты мечтаешь тренироваться в удовольствие лично с нами в любое удобное для тебя
                                        время!
                                    </p>
                                    <p>
                                        <b>03</b>
                                        Тебе нужна поддержка, коллектив девочек и личный дневник контроля с Волшебными
                                        пенделями для мотивации!
                                    </p>
                                </div>
                                <div class="card-footer card-footer-edit">
                                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                                            data-target="#merit"> Изменить
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="merit" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                ТЕБЕ К НАМ, ЕСЛИ:
                                            </h4>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                        </div>
                                        <form action="">
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label">Заголовок</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label">01</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label">02</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label">03</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                                    Закрыть
                                                </button>
                                                <button class="btn btn-primary" type="button">Сохранить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <b>ЛИЧНЫЙ КАБИНЕТ</b><br>
                                Это твое персональное пространство, где собрано все необходимое для достижения
                                идеального тела!
                            </div>
                            <div class="card-body">
                                <div class="jumbotron">
                                    <p>
                                        <br><b>Контроль и мотивация</b>
                                        <br>Коллектив девочек и личный дневник это отдельная наша гордость! Мы лично
                                        <br>общаемся с
                                        <br>каждым, проверяем дневники и раздаем "Волшебные пендели" для мотивации!
                                    </p>
                                    <p>
                                        <br><b>Вкусное меню</b>
                                        <br>Грамотно составленное меню это 70% успеха. Никаких диет и голодовок. Только вкусные
                                        <br>рецепты из
                                        <br>доступных продуктов, которые можно купить в любом магазине!
                                    </p>
                                    <p>
                                        <br><b>Советы по уходу</b>
                                        <br>В программы обязательно включен чек-лист по уходу за собой! Об этом мало кто
                                        <br>говорит, но
                                        <br>поддерживать тонус кожи во время и после похудения очень важно!
                                    </p>
                                    <p>
                                        <br><b>
                                            Видео-тренировки
                                        </b>
                                        <br>Каждая тренировка продумана
                                        <br>до мелочей. Включай видео и мы вместе,
                                        <br>от разминки до растяжки выполним всю тренировку!
                                    </p>
                                </div>
                                <div class="card-footer card-footer-edit">
                                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                                            data-target="#office"> Изменить
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="office" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                ТЕБЕ К НАМ, ЕСЛИ:
                                            </h4>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Главный заголовок</label>
                                                        <div>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Подзаголовок</label>
                                                        <div>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <h5 class="modal-title col-md-12">
                                                        Мотивация:
                                                    </h5>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Заголовок</label>
                                                        <div>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Текст</label>
                                                        <div>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <h5 class="modal-title col-md-12">
                                                        Меню:
                                                    </h5>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Заголовок</label>
                                                        <div>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Текст</label>
                                                        <div>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <h5 class="modal-title col-md-12">
                                                        Уход:
                                                    </h5>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Заголовок</label>
                                                        <div>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Текст</label>
                                                        <div>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <h5 class="modal-title col-md-12">
                                                        Тренировки:
                                                    </h5>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Заголовок</label>
                                                        <div>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-form-label">Текст</label>
                                                        <div>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                                        Закрыть
                                                    </button>
                                                    <button class="btn btn-primary" type="button">Сохранить</button>
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
        </div>
    </div>
@endsection


@section('javascript')

@endsection
