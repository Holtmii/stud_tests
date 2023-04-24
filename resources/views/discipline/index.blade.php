@extends('base')


@section('title')
Преподаватели
@endsection


@section('main_content')


            <h1>Список дисциплин</h1>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-discipline">
            Добавить дисциплину
            </button>


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
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Название</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Название">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Описание</label>
                      <div class="col-sm-10">
                        <input type="text" name="description" class="form-control" id="inputEmail3" placeholder="Описание">
                      </div>
                    </div>

                    <div class="form-group row">
                          <label for="disabledSelect" class="col-sm-2 col-form-label">Пользователь</label>
                          <div class="col-sm-5">
                                <select id="disabledSelect" name="id_user" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}"> {{$user->surname}} </option>
                                    @endforeach
                                </select>
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







            <div class="alert alert-warning">
                <table class="table table-hover">
                    <tr>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Преподаватель</th>
                    </tr>

                    @foreach($disciplines as $el)
                        <tr>
                            <td>{{$el->name}}</td>
                            <td>{{$el->description}}</td>
                            <td>{{$el->user_surname}} {{$el->user_name}} {{$el->user_middlename}}</td>
                        </tr>
                    @endforeach

                </table>

            </div>

@endsection
