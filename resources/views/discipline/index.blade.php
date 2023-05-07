@extends('layouts.app')


@section('title')
Преподаватели
@endsection


@section('content')


    <div class="container">
        <div class="row">
            <div class="col">

                <h1 class="title">Список дисциплин</h1>
                <div class="btn-centre">
                    <button type="button" class="btn-modal" data-bs-toggle="modal" data-bs-target="#create-discipline">
                    Создать дисциплину
                    </button>
                </div>

    {{--            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-discipline_group">--}}
    {{--                Добавить в группу--}}
    {{--            </button>--}}

                <!-- Modal -->
                <div class="modal fade" id="create-discipline" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Создание дисциплины</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>


                      </div>
                      <div class="modal-body">

                      <form method="post" action="{{ route('discipline.store') }}">
                        @csrf
                        <div class="form-group input-class">
                          <label>Название</label>
                            <input type="text" name="name" class="form-control bg-white" id="inputEmail3" placeholder="Введите название">
                        </div>
                        <div class="form-group input-class">
                              <label>Описание</label>
                                  <textarea name="description" class="form-control bg-white" placeholder="Введите описание"></textarea>
{{--                            <input type="text" name="description" class="form-control" id="inputEmail3" placeholder="Описание">--}}
                        </div>

                        <div class="form-group input-class">
                              <label for="disabledSelect">Пользователь</label>
                                    <select id="disabledSelect" name="id_user" class="form-control bg-white">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}"> {{$user->surname}} </option>
                                        @endforeach
                                    </select>
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

            <div class="modal fade" id="create-discipline_group" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Добавление группы</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="POST" action="{{ route('discipline_group') }}">
                                @csrf
                                <div class="form-group input-class">
                                    <label for="disabledSelect">Группа</label>
                                        <select id="disabledSelect" name="id_group" class="form-control bg-white">
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}"> {{$group->name}} </option>
                                            @endforeach
                                        </select>

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

            <div class="alert alert-light">
                <table class="table table-hover">
                    <tr>
                        <th class>Название</th>
                        <th>Описание</th>
                        <th>Преподаватель</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

                    @foreach($disciplines as $el)
                        <tr>
                            <td>{{$el->name}}</td>
                            <td>{{$el->description}}</td>
                            <td>{{$el->user_surname}} {{$el->user_name}} {{$el->user_middlename}}</td>
                            <td>
                                <button type="button" class="btn-add" data-bs-toggle="modal" data-bs-target="#create-discipline_group">
                                    Добавить группу
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn-img"><img class="img-size" src="/images/pen.png"></button>

                            </td>
                            <td>
                                <button type="button" class="btn-img"><img class="img-size" src="/images/delete.png"></button>
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>

@endsection
