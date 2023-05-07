@extends('layouts.app')


@section('title')
    Группы
@endsection


@section('content')


    <div class="container">
        <div class="row">
            <div class="col">

                <h1 class="title">Список групп</h1>
                <div class="btn-centre">
                    <button type="button" class="btn-modal" data-bs-toggle="modal" data-bs-target="#create_group">
                        Создать группу
                    </button>
                </div>


                <!-- Modal -->

        <div class="modal fade" id="create_group" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавление группы</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{ route('group.store') }}">
                            @csrf
                            <div class="form-group input-class">
                                    <label>Название группы</label>
                                    <input type="text" name="name" class="form-control bg-white" id="inputEmail3" placeholder="Введите название группы">

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
                    <th class>Название группы</th>
                    <th>Студенты</th>
                    <th></th>
                    <th></th>
                </tr>

                @foreach($groups as $el)
                    <tr>
                        <td>{{$el->name}}</td>
                        <td>
                        @foreach($users as $user)
                            @if($user->id_group == $el->id)
                                {{$user->surname}} {{$user->name}} {{$user->middlename}}<br/>
                            @endif
                        @endforeach
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
