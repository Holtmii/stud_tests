@extends('layouts.app')


@section('title')
    Темы
@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col">

                <label for="disabledSelect" class="col-form-label">Выберите дисциплину</label>
                <div class="col-sm-5">
                    <select id="disabledSelect" name="id_discipline" class="form-control" onchange="window.location.search='discipline='+this.value;">
                        @if(Request::exists('discipline'))
                            <option selected="selected">
                            @foreach($disciplines as $discipline)
                                @if($discipline->id == request()->get('discipline'))
                                    <option selected="selected">{{$discipline->name}}</option>
                                    @endif
                                    @endforeach
                                    </option>
                                    {{--                            <option selected="selected" value="{{ app('request')->input('subject') - 1}}">{{$disciplines[app('request')->input('subject')]->name}}</option>--}}
                                @else
                                    {{--                            <option selected="selected" value="{{$disciplines[0]->id}}">{{$disciplines[0]->name}}</option>--}}
                                    {{--                        @endif--}}
                                    <option selected="selected">Выберите дисциплину</option>
                                @endif
                                @foreach($group_disciplines as $group_discipline)
                                    @foreach($disciplines as $discipline)
                                        @if($group_discipline->id_group == $group[0]->id && $discipline->id == $group_discipline->id_discipline)
                                            <option value="{{$discipline->id}}"> {{$discipline->name}} </option>
                                        @endif
                                    @endforeach

{{--                                @foreach($disciplines as $discipline)--}}

{{--                                            @if(Auth::user()->id_group == $group[0]->id && $group_discipline->id_group == $group[0]->id )--}}
{{--                                                <option value="{{$discipline->id}}"> {{$discipline->name}} </option>--}}
{{--                                            @endif--}}
{{--                                    @endforeach--}}
                                @endforeach
                    </select>
                </div>


                <h1 class="title-stud">Список тем</h1>
            </div>
        </div>


        <div class="row disc-block ">
                @foreach($subjects as $subject)
                    @if(Auth::user()->id_group == $subject->id_group)
                        <div class="subject-list col-md-3">
                            <h4>Тема:"{{$subject->name}}"</h4>
                            <p>Количество попыток: {{$subject->attempt}}</p>
                            <button onclick="location.href='test/{{$subject->id}}'" type="button" class="btn-more">
                                Начать тестирование
                            </button>
                        </div>
                    @endif
                @endforeach
        </div>
    </div>

@endsection
