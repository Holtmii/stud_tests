@extends('layouts.app')


@section('title')
    Пользователи
@endsection

@section('content')
    <div class="container col-5" style="margin-top: 40px">
        <form method="post" action="{{route('user_update', $user)}}">
            {{ isset($user) ? method_field('PUT') : method_field('POST') }}
            @csrf
            <div class="form-group input-class">
                <label>Фамилия</label>
                <input type="text" name="surname" class="form-control bg-white" id="inputEmail3" placeholder="Введите фамилию" value="{{ old('surname', isset($user) ? $user->surname : null) }}">
            </div>

            <div class="form-group input-class">
                <label>Имя</label>
                <input type="text" name="name" class="form-control bg-white" id="inputEmail3" placeholder="Введите имя" value="{{ old('name', isset($user) ? $user->name : null) }}">
            </div>

            <div class="form-group input-class">
                <label>Отчество</label>
                <input type="text" name="middlename" class="form-control bg-white" id="inputEmail3" placeholder="Введите отчество" value="{{ old('middlename', isset($user) ? $user->middlename : null) }}">
            </div>

            <div class="form-group input-class">
                <input name="role_pers" type="checkbox" @if($user->role_pers == 1) checked @endif value="1" id="gridCheck1" class="check-color"
                       onclick="document.getElementById('groupId').value = 'null';
                                                    document.getElementById('groupId').disabled = !document.getElementById('groupId').disabled;">
                <label for="gridCheck1">  Преподаватель</label><br>

            </div>
            <div class="form-group input-class">
                <label>Группа</label>
                <select id="groupId" name="id_group" class="form-control" @if($user->role_pers == 1) disabled @endif>
                    <option selected value="">Выберите группу</option>
                    @foreach($groups as $group)
                        @if($group->id == $user->id_group)
                            <option selected value="{{ old('id_group', isset($user) ? $user->id_group : null) }}">{{isset($user) ? $group->name : null}}</option>
                        @else
                            <option value="{{ $group->id }}"> {{ $group->name }} </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group input-class">
                <label>Email</label>
                <input type="email" name="email" class="form-control bg-white" id="inputEmail3" placeholder="Введите email" value="{{ old('email', isset($user) ? $user->email : null) }}">
            </div>

            <div class="modal-footer">
                <a href="{{route('stud')}}" class="btn-cl">Отмена</a>
{{--                <button type="button" class="btn-cl" data-bs-dismiss="modal">Отмена</button>--}}
                <button type="submit" class="btn-add">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
