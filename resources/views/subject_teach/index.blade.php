@extends('layouts.app')


@section('title')
    Темы
@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col">

                <label for="disabledSelect" class="col-form-label">Выберите дисциплину</label>
                <div class="col-sm-5">
                    <select id="disabledSelect" name="id_discipline" class="form-control" onchange="window.location.search='discipline='+this.value;">
                        @if(Request::exists('discipline'))
                            <option selected="selected">
                                @foreach($disciplines as $discipline)
                                    @if($discipline->id == request()->get('discipline'))
                                        <option selected="selected">{{$discipline->name}}</option>
                                    @endif
                                @endforeach
                            </option>
{{--                            <option selected="selected" value="{{ app('request')->input('subject') - 1}}">{{$disciplines[app('request')->input('subject')]->name}}</option>--}}
                        @else
{{--                            <option selected="selected" value="{{$disciplines[0]->id}}">{{$disciplines[0]->name}}</option>--}}
{{--                        @endif--}}
                        <option selected="selected">Выберите дисциплину</option>
                        @endif
                        @foreach($disciplines as $discipline)
                            @if(Auth::user()->id == $discipline->id_user)
                                    <option value="{{$discipline->id}}"> {{$discipline->name}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>


                <h1 class="title">Список тем</h1>

                <div class="wrapper">

                    <div class="btn-centre block">
                        <button type="button" class="btn-modal" data-bs-toggle="modal" data-bs-target="#create-subject">
                            Добавить новую тему
                        </button>
                    </div>

                    <div class="btn-centre block">
                        <button type="button" class="btn-modal" data-bs-toggle="modal" data-bs-target="#create-subject">
                            Добавить существующую тему
                        </button>
                    </div>
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
                                    <div class="form-group input-class">
                                        <label>Название</label>
                                        <input type="text" name="name" class="form-control bg-white" placeholder="Название">
                                    </div>

                                    <div class="form-group input-class">
                                        <label>Кол-во попыток</label>
                                        <input type="text" name="attempt" class="form-control bg-white" placeholder="Попытки">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn-cl" data-bs-dismiss="modal">Отмена</button>
                                        <button type="submit" class="btn-add">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


                <div class="row disc-block ">
                    @foreach($disciplines as $discipline)
                        @foreach($subjects as $el)
                            @if(Auth::user()->id == $discipline->id_user && $discipline->id == $el->id_discipline)
                                <div class="subject-list col-md-3">
                                    <h4>Тема:"{{$el->name}}"</h4>
                                    <p>Количество попыток: {{$el->attempt}}</p>
                                    <div class="input-class">
                                        <button type="button" class="btn-img block"><img class="img-size" src="/images/pen.png"></button>
                                        <button type="button" class="btn-img block"><img class="img-size" src="/images/delete.png"></button>
                                    </div>
                                    <button type="button" onclick="location.href='{{ route('question', $el->id) }}'" class="btn-more">
                                        Просмотр заданий по теме
                                    </button>
                                </div>
                            @endif

                        @endforeach
                    @endforeach
                </div>





    </div>





@endsection
