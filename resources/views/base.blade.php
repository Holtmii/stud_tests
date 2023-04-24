<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>

<nav class="navbar">

    <form id="myDiv" class="form-inline">
        @if (Auth::check() and (Auth::user()->role_superuser==1) AND (Auth::user()->role_pers==0))
            <a class="me-3 py-2 text-dark text-decoration-none" href="/user">Пользователи</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="/discipline">Дисциплины</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="/">Группы</a>
        @elseif(Auth::check() and (Auth::user()->role_superuser==0) AND (Auth::user()->role_pers==1))
            <a class="me-3 py-2 text-dark text-decoration-none" href="/subject_teach">Дисциплины</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="/">Результаты</a>
        @elseif(Auth::check() and (Auth::user()->role_superuser==0) AND (Auth::user()->role_pers==0))
            <a class="me-3 py-2 text-dark text-decoration-none" href="/">Тесты</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="/">Результаты</a>
        @endif
            <a class="me-3 py-2 text-dark text-decoration-none" href="/">Личный кабинет</a>
            <a class="btn btn-outline-primary" href="#">Выход</a>
    </form>
</nav>



<div class="container">
    @yield('main_content')
</div>

{{--<script>--}}
{{--    function cityChangedTrigger () {--}}
{{--        let queryString = window.location.search;--}}
{{--        let params = new URLSearchParams(queryString);--}}
{{--        params.delete('city');--}}
{{--        params.append('city', document.getElementById("city").value);--}}
{{--        document.location.href = "?" + params.toString();--}}
{{--    }--}}
{{--</script>--}}

</body>
</html>
