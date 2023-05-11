@extends('layouts.app')


@section('title')
Пользователи
@endsection

@section('content')
<div class="container">
    <div class="row">



        <div class="col">
            <h1 class="title">Список пользователей</h1>
            <div class="btn-centre">
                <button type="button" class="btn-modal" data-bs-toggle="modal" data-bs-target="#create-pers">
                    Добавить пользователя
                </button>
            </div>


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
                                <div class="form-group input-class">
                                    <label>Фамилия</label>
                                        <input type="text" name="surname" class="form-control bg-white" id="inputEmail3" placeholder="Введите фамилию">
                                </div>

                                <div class="form-group input-class">
                                    <label>Имя</label>
                                        <input type="text" name="name" class="form-control bg-white" id="inputEmail3" placeholder="Введите имя">
                                </div>

                                <div class="form-group input-class">
                                    <label>Отчество</label>
                                        <input type="text" name="middlename" class="form-control bg-white" id="inputEmail3" placeholder="Введите отчество">
                                </div>


                                <div class="form-group input-class">
                                    <input name="role_pers" type="checkbox" value="1" id="gridCheck1" class="check-color"
                                           onclick="document.getElementById('groupId').value = 'null';
                                                    document.getElementById('groupId').disabled = !document.getElementById('groupId').disabled;">
                                            <label for="gridCheck1">  Преподаватель</label><br>
                                    <label>Группа</label>
                                    <select id="groupId" name="id_group" class="form-control">
                                        <option value='null' selected>Выберите группу</option>
                                        @foreach($groups as $group)
                                            <option value="{{$group->id}}"> {{$group->name}} </option>
                                        @endforeach
                                    </select>
                                </div>



                                <div class="form-group input-class">
                                    <label>Email</label>
                                        <input type="email" name="email" class="form-control bg-white" id="inputEmail3" placeholder="Введите email">
                                </div>

                                <div class="form-group input-class">
                                    <label>Пароль</label>
                                        <input type="password" name="password" class="form-control bg-white" id="inputPassword3" placeholder="Введите пароль">
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
{{--        <h1>Все пользователи</h1>--}}

        <div class="alert alert-light">

            <div class="col-sm-2">
                <label>Тип пользователей</label>
                <select id="disabledSelect" name="id_group" class="form-control" onchange="window.location.search='user_role='+this.value+'&super_user=0';">

                    @if( Request::exists('user_role') and app('request')->input('user_role') ==0)
                        <option value="0" selected>Студенты</option>
                    @else
                        <option value="1" selected>Преподаватели</option>
                    @endif
                    <option value="0">Студенты</option>
                    <option value="1">Преподаватели</option>
                </select>

            </div>
            <br>


<div class="alert alert-light">
            <table class="table table-hover">
                <tr>
                    <th>ФИО</th>
                    @if( Request::exists('user_role') and app('request')->input('user_role') ==0)
                    <th>Группа</th>
                    @endif
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>

                @foreach($user as $el)
                    <tr>
                        <td>{{$el->surname}} {{$el->name}}  {{$el->middlename}}</td>
                        @if( Request::exists('user_role') and app('request')->input('user_role') ==0)
                        <td>{{$el->group_name}}</td>
                        @endif
                        <td>{{$el->email}}</td>
                        <td>
{{--                            <a href="{{ route('user_edit', $el->id) }}" class="btn-img"><img class="img-size" src="/images/pen.png"></a>--}}
                            <button type="button" class="btn-img" onclick="location.href='{{ route('user_edit', $el->id) }}'"><img class="img-size" src="/images/pen.png"></button>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('destroy_user', $el->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
{{--                                <a onclick="return confirm('Вы уверены что хотите удалить пользователя {{$el->surname}} {{$el->name}}  {{$el->middlename}}?')" class="btn-img"><img class="img-size" src="/images/delete.png"></a>--}}
                                <button onclick="return confirm('Вы уверены что хотите удалить пользователя {{$el->surname}} {{$el->name}}  {{$el->middlename}}?')" type="submit" class="btn-img"><img class="img-size" src="/images/delete.png"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </table>
</div>

        </div>
    </div>

</div>









@endsection
