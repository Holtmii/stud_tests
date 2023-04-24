@extends('base')


@section('title')
Пользователи
@endsection

@section('main_content')
<div class="container">
    <div class="row">


        <div class="sidenav">
            <label for="disabledSelect" class="col-form-label">Дисциплина</label>
            <div class="col-sm-5 dis">
                <select id="disabledSelect" name="id_group" class="form-control">
                    @foreach($groups as $group)
                        <option value="{{$group->id}}"> {{$group->name}} </option>
                    @endforeach
                </select>
            </div>

            <a href="#">Студенты</a><hr>
            <a href="#">ПРеподы</a><hr>
            <a href="#">gkdjngkdgdkgrkshgrkdghrdkrrgjndkgndkjgnjdknfdkggndkg</a><hr>
        </div>



        <div class="col">
            <h1>Список пользователей</h1>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-pers">
                Добавить пользователя
            </button>


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-group">
                Добавить группу
            </button>

            <!-- Modal -->
            <div class="modal fade" id="create-pers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Создание пользователя</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Фамилия</label>
                                    <div class="col-sm-10 ">
                                        <input type="text" name="surname" class="form-control" id="inputEmail3" placeholder="Фамилия">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Имя</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Имя">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Отчество</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="middlename" class="form-control" id="inputEmail3" placeholder="Отчество">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <input name="role_pers" type="checkbox" value="1" id="gridCheck1"
                                                   onclick="document.getElementById('groupId').value = 'null';
                                                            document.getElementById('groupId').disabled = !document.getElementById('groupId').disabled;">
                                            <label for="gridCheck1">
                                                Преподаватель
                                            </label>
                                        </div>
                                    </div>

                                    <label for="disabledSelect" class="col-sm-2 col-form-label">Группа</label>
                                    <div class="col-sm-5">
                                        <select id="groupId" name="id_group" class="form-control">
                                                <option value='null' selected>Выберите группу</option>
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}"> {{$group->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <!-- <div class="form-group row">
                                    <label for="disabledSelect" class="col-sm-2 col-form-label">Группа</label>
                                    <div class="col-sm-5">
                                        <select id="disabledSelect" name="group" class="form-control">
                                        <option>Группа</option>
                                        </select>
                                    </div>
                                    </div> -->

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
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


            <div class="modal fade" id="create-group" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Создание группы</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="post" action="{{ route('group_create') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Название</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Название группы">
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


    <div class="col">
        <h1>Все пользователи</h1>

        <div class="alert alert-warning">
            <table class="table table-hover">
                <tr>
                    <th>ФИО</th>
                    <th>Группа</th>
                    <th>Email</th>
                </tr>

                @foreach($user as $el)
                    <tr>
                        <td>{{$el->name}} {{$el->surname}} {{$el->middlename}}</td>
                        <td>{{$el->group_name}}</td>
                        <td>{{$el->email}}</td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>

</div>









@endsection
