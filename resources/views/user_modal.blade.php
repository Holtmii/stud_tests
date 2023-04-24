@extends('user')

@section('user_modal')
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
                                <input name="role_pers" type="checkbox" value="1" id="gridCheck1">
                                <label for="gridCheck1">
                                    Преподаватель
                                </label>
                            </div>
                        </div>

                        <label for="disabledSelect" class="col-sm-2 col-form-label">Группа</label>
                        <div class="col-sm-5">
                            <select id="disabledSelect" name="id_group" class="form-control">
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
@endsection
