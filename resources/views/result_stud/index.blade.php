@extends('layouts.app')


@section('title')
    Результаты тестов
@endsection

@section('content')




    <div class="container">

        <div class="row">


            <div class="col">

                <h1 class="title-stud">Результаты прохождения тестов </h1>


                <label for="disabledSelect" class="col-form-label">Выберите дисциплину</label>
                <div class="col-sm-5 select-disc">
                    <select id="disabledSelect" name="id_discipline" class="form-control" onchange="window.location.search='discipline='+this.value;">
                        @if(Request::exists('discipline'))
                            <option selected="selected">
                            @foreach($disciplines as $discipline)
                                @if($discipline->id == request()->get('discipline'))
                                    <option selected="selected">{{$discipline->name}}</option>
                                    @endif
                                    @endforeach
                                    </option>
                                @else
                                    <option selected="selected">Выберите дисциплину</option>
                                @endif
                                @foreach($group_disciplines as $group_discipline)
                                    @foreach($disciplines as $discipline)
                                        @if($group_discipline->id_group == $group[0]->id && $discipline->id == $group_discipline->id_discipline)
                                            <option value="{{$discipline->id}}"> {{$discipline->name}} </option>
                                        @endif
                                    @endforeach

                                @endforeach
                    </select>
                </div>

                <div>


                    <div class="alert alert-light">
                        <table class="table table-hover">
                            <tr>
                                <th>Название</th>
                                <th>Статус</th>
                                <th>Балл</th>
                            </tr>
                            @foreach($subjects as $subject)
                            @foreach($results as $result)

                                    @if(Auth::user()->id_group == $subject->id_group && $result->id_user == Auth::user()->id && $result->id_subject == $subject->id)
                                        <tr>
                                            <td>Тема:"{{$subject->name}}"</td>
                                            <td>Завершено</td>
{{--                                            @if()--}}
                                                <td>{{$result->mark}}</td>
{{--                                            @endif--}}
{{--                                            <td>Количество попыток: {{$subject->attempt}}</td>--}}
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                </div>


                </div>
            </div>
        </div>

@endsection
