@extends('layouts.app')


@section('title')
    Результаты тестов
@endsection

@section('content')




    <div class="container">

        <div class="row">


            <div class="col">

                <h1 class="title-stud">Результаты прохождения тестов </h1>
                <div class="nav-wrapper">
                    <div class="nav-marg">
                        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white snav-wrap">

                            <label for="disabledSelect" class="col-form-label">Выберите дисциплину</label>
                            <div class="col-sm-12">
                                <select id="disabledSelect" name="id_discipline" class="form-control" onchange="window.location.search='discipline='+this.value;">
                                    @if( Request::exists('discipline'))
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
                                            @foreach($disciplines as $discipline)
                                                @if(Auth::user()->id == $discipline->id_user)
                                                    <option value="{{$discipline->id}}"> {{$discipline->name}} </option>
                                                @endif
                                            @endforeach
                                </select>
                            </div>


                            <div class="position-sticky col-md-8">
                                <div class="list-group list-group-flush mx-3 mt-4">
                                    <!-- Collapsed content -->
                                    <ul id="collapseExample1" class="collapse show list-group list-group-flush">
                                        @if(Request::exists('discipline'))
                                            @foreach($groups as $group)
                                                @foreach($group_disciplines as $group_discipline)
                                                    @if(request()->get('discipline') == $group_discipline->id_discipline && $group->id == $group_discipline->id_group)
                                                        <li class="list-group-item py-1">
                                                            <a class="text-dec" onclick="window.location.search='discipline=' + {{request()->get('discipline')}} + '&group='+{{$group->id}}" class="text-reset">{{$group->name}}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </ul>


                                </div>
                            </div>
                        </nav>
                    </div>

                     <div>
                        @if(Request::exists('group') && $subjects != null)

{{--                             @foreach($users as $user)--}}
{{--                                 @foreach($results as $result)--}}
{{--                                     @foreach($subjects as $subject)--}}
{{--                                         <div class="container">--}}
{{--                                             <h3>{{$subject->name}}</h3>--}}
{{--                                     @endforeach--}}
{{--                                 @endforeach--}}
{{--                             @endforeach--}}

{{--                                     <div class="alert alert-light">--}}
{{--                                         <table class="table table-hover">--}}
{{--                                             <tr>--}}
{{--                                                 <th>ФИО</th>--}}
{{--                                                 <th>Балл</th>--}}
{{--                                                 <th>Прошел</th>--}}
{{--                                             </tr>--}}
{{--                                             @foreach($results as $result)--}}
{{--                                                 --}}{{--                                                @if($subject->id_discipline == request()->get('discipline'))--}}
{{--                                                 --}}{{--                                                    <td>{{$result->id}}</td>--}}
{{--                                                 --}}{{--                                                    <td>{{$result->mark}}</td>--}}
{{--                                                 --}}{{--                                                    <td>{{$result->id}}</td>--}}
{{--                                                 --}}{{--                                                @endif--}}

{{--                                                 @foreach($users as $user)--}}
{{--                                                     @if($result->id_subject == $subject->id && $result->id_user == $user->id && $user->id_group == request()->get('group'))--}}
{{--                                                         <tr>--}}
{{--                                                             <td>--}}
{{--                                                                 {{$user->surname}} {{$user->name}}--}}
{{--                                                             </td>--}}
{{--                                                             <td>--}}
{{--                                                                 @foreach($results as $result)--}}
{{--                                                                     @if($result->id_user == $user->id)--}}
{{--                                                                         {{$result->mark}}<br/>--}}
{{--                                                                     @endif--}}
{{--                                                                 @endforeach--}}
{{--                                                             </td>--}}
{{--                                                             <td>{{$result->mark}}</td>--}}
{{--                                                             <td>Да</td>--}}
{{--                                                         </tr>--}}
{{--                                                     @endif--}}
{{--                                                 @endforeach--}}
{{--                                             @endforeach--}}
{{--                                         </table>--}}
{{--                                     </div>--}}
{{--                                 </div>--}}
{{--                             @endforeach--}}

                            @foreach($subjects as $subject)
                                <div class="container">
                                    <h3>{{$subject->name}}</h3>
                                    <div class="alert alert-light">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ФИО</th>
                                                <th>Балл</th>
                                                <th>Прошел</th>
                                            </tr>
                                            @foreach($results as $result)
                                                @foreach($users as $user)
                                                    @if($result->id_subject == $subject->id && $result->id_user == $user->id && $user->id_group == request()->get('group'))
                                                        <tr>
                                                            <td>
                                                                {{$user->surname}} {{$user->name}}
                                                            </td>
                                                            <td>
                                                                @foreach($results as $result)
                                                                    @if($result->id_user == $user->id)
                                                                        {{$result->mark}}<br/>
                                                                    @endif
                                                                @endforeach
                                                            </td>
{{--                                                            <td>{{$result->mark}}</td>--}}
{{--                                                            <td>Да</td>--}}
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                       @endif
                     </div>
                </div>
        </div>
    </div>

@endsection
