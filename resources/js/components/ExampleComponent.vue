<template>

    <div class="modal fade" id="edit-pers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменить пользователя</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" action="<? route('user') ?>">
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
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            editModal(){
                $('#edit-pers').modal('show');
            },
        }
    }
</script>
