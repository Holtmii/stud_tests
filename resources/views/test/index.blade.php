@extends('layouts.app')

@section('content')
{{--{{dd(\request())}}--}}
    <h1>{{$subject[0]->name}}</h1>

{{--    @foreach($question as $quest)--}}
{{--        @if(Cookie::get('first') < 2)--}}
            @if(request()->get('first') < 2)
                <p>{{$first_question->text_question }}</p>
            @else
                <p>{{$question->text_question }}</p>
            @endif

{{--        @endif--}}
{{--            <p>{{$question->text_question }}</p>--}}
        @foreach($answers as $answer)
{{--            @if(Cookie::get('first') < 2)--}}
                @if(request()->get('first') < 2)
                    @if($answer->id_question == $first_question->id)
                        <p><input style="margin-right: 5px" onclick="{{\request()->merge(['solved' => $answer->id_question])}}" type="checkbox">{{$answer->text_answer}}</p>
                    @endif
                @else
                    @if($answer->id_question == $question->id)
                        <p><input style="margin-right: 5px" onclick="{{\request()->merge(['solved' => $answer->id_question])}}" type="checkbox">{{$answer->text_answer}}</p>


                    @endif
                @endif

{{--            @else--}}
{{--                @if($answer->id_question == $question->id)--}}
{{--                    <p><input style="margin-right: 5px" type="checkbox">{{$answer->text_answer}}</p>--}}
{{--                @endif--}}
{{--            @endif--}}
        @endforeach
        <button onclick="location.href=window.location.href;" class="btn btn-success">Следующий вопрос</button>
{{--    @endforeach--}}
@endsection
