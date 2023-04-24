@extends('base')


@section('title')
    Темы
@endsection

@section('main_content')
    <div class="container">


        <div class="row">
            <div class="col">
                <h1>Список тем</h1>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-subject">
                    Добавить новую тему
                </button>
                <br>
                <label for="disabledSelect" class="col-form-label">Выберите дисциплину</label>
                <div class="col-sm-5">
                    <select id="disabledSelect" name="id_discipline" class="form-control" onchange="window.location.search='subject='+this.value;">
                        @if( Request::exists('subject'))
                            <option selected="selected" value="{{ app('request')->input('subject') }}">{{$disciplines[app('request')->input('subject') - 1]->name}}</option>
                        @else
                            <option selected="selected" value="{{$disciplines[0]->id}}">{{$disciplines[0]->name}}</option>
                        @endif
                        @foreach($disciplines as $discipline)
                            <option value="{{$discipline->id}}"> {{$discipline->name}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <h1>Все темы</h1>
                    @foreach($subjects as $el)
                        <div class="alert alert-warning">
                            <p>Тема:"{{$el->name}}" Количество попыток: {{$el->attempt}}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Modal -->
                <div class="modal fade" id="create-subject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Создание темы</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Название</label>
                                        <div class="col-sm-10 ">
                                            <input type="text" name="name" class="form-control"  placeholder="Название">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Кол-во попыток</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="attempt" class="form-control" placeholder="Попытки">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                        <button type="submit" class="btn btn-primary">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>





@endsection
