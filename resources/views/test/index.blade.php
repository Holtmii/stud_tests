@extends('layouts.app')

@section('content')

    <h1>{{$subject[0]->name}}</h1>

    @if(Session()->get('first') < 2)
        <p>{{$first_question->text_question }}</p>
    @elseif(isset($question))
        <p>{{$question->text_question }}</p>
    @endif

    @foreach($answers as $answer)
        @if(isset($first_question) && session()->get('first') < 2)
            @if($answer->id_question == $first_question->id)
                <p><input style="margin-right: 5px" onclick="{{\request()->merge(['solved' => $answer->id_question])}}" type="checkbox">{{$answer->text_answer}}</p>
            @endif
        @elseif(isset($question))
            @if($answer->id_question == $question->id)
                <p><input style="margin-right: 5px" onclick="{{\request()->merge(['solved' => $answer->id_question])}}" type="checkbox">{{$answer->text_answer}}</p>
            @endif
        @endif
    @endforeach
{{--    {{dd($countQuestions != sizeof(\session()->get('solved')))}}--}}
    @if($countQuestions != sizeof(\session()->get('solved')))
        <button onclick="location.href=window.location.href;" class="btn btn-success">Следующий вопрос</button>
    @else
        <button class="btn btn-success">Завершить тест</button>
    @endif
{{--    <p>{{session()->get('first')}}</p>--}}
{{--    <p>--}}
{{--        @if(\session()->get('solved') !== null)--}}
{{--            @foreach(\session()->get('solved') as $test)--}}
{{--                {{$test}}--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </p>--}}
@endsection
