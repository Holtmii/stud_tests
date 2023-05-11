@extends('layouts.app')


@section('title')
    Вопросы
@endsection

@section('content')

    <h1 class="title">Список вопросов</h1>
    <div class="btn-centre">
        <button type="button" class="btn-modal" data-bs-toggle="modal" data-bs-target="#create_question">
            Создать вопрос
        </button>
    </div>

    <div class="modal fade" id="create_question" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Создание вопроса</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('question_store') }}">
                        @csrf
                        <div class="form-group input-class">
                            <label>Текст вопроса</label>
                            <textarea name="text_question" class="form-control bg-white" placeholder="Введите вопрос"></textarea>
                        </div>


                        <div class="form-group input-class">
                            <label>Выберите сложность вопроса</label>
                            <select name="complexity" class="form-control bg-white">
                                <option value="0">Легкий</option>
                                <option value="1">Средний</option>
                                <option value="2">Сложный</option>
                            </select>
                        </div>


                        <div class="form-group" style="visibility: hidden; display: none">
                            <input name="id_subject" value="{{$id}}">
                        </div>

{{--                        <div class="form-group" style="visibility: hidden; display: none">--}}
{{--                            <input name="complexity" value="2">--}}
{{--                        </div>--}}


{{--                        <div id="answers" class="form-group input-class">--}}
{{--                            <div class="form-row align-items-center">--}}
{{--                                <div class="col-auto">--}}
{{--                                    <label>Текст ответа</label>--}}
{{--                                    <input name="ans1" type="text" class="form-control bg-white mb-2" placeholder="Введите ответ">--}}
{{--                                </div>--}}
{{--                                <div class="col-auto">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <div class="form-check mb-2">--}}
{{--                                            <input class="form-check-input" type="checkbox" id="autoSizingCheck">--}}
{{--                                            <label class="form-check-label" for="autoSizingCheck">--}}
{{--                                                Верный ответ--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}



{{--                        <div class="form-group input-class">--}}
{{--                            <label>Текст ответа</label>--}}
{{--                            <input name="ans2"type="text" class="form-control bg-white mb-2" placeholder="Введите ответ">--}}
{{--                        </div>--}}


                        <div id="answers" class="form-group input-class">
{{--                            <div class="form-row align-items-center">--}}
                            <label class="col-8">Текст ответа</label>
                            <label class="col-4">Верный ответ</label>
                            <input name="ans1" type="text" class="col-8 form-control-ans bg-white mb-2" placeholder="Введите ответ">
                            <input name="ans1Right" class="col-4 form-check-input" type="checkbox" id="autoSizingCheck">

                            <label class="col-8">Текст ответа</label>
                            <label class="col-4">Верный ответ</label>
                            <input name="ans2" type="text" class="col-8 form-control-ans bg-white mb-2" placeholder="Введите ответ">
                            <input name="ans2Right" class="col-4 form-check-input" type="checkbox" id="autoSizingCheck">
{{--                                <div class="row">--}}
{{--                                    <div class="col-8">--}}
{{--                                        <label class="col-8">Текст ответа</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-4">--}}
{{--                                        <label class="form-check-label" for="autoSizingCheck">--}}
{{--                                            Верный ответ--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-8">--}}
{{--                                        <input name="ans1" type="text" class="form-control bg-white mb-2" placeholder="Введите ответ">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-4">--}}
{{--                                        <input class="form-check-input" type="checkbox" id="autoSizingCheck">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-auto">--}}
{{--                                    <label>Текст ответа</label>--}}
{{--                                    <input name="ans1" type="text" class="form-control bg-white mb-2" placeholder="Введите ответ">--}}
{{--                                </div>--}}
{{--                                <div class="col-auto">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <div class="form-check mb-2">--}}
{{--                                            <input class="form-check-input" type="checkbox" id="autoSizingCheck">--}}
{{--                                            <label class="form-check-label" for="autoSizingCheck">--}}
{{--                                                Верный ответ--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>




                        <div class="form-group input-class btn-centre">
                            <button onclick="
                            inputCount++; // Increment input count by one
                            if(inputCount>maxInputAllowed){
                                alert('Нельзя добавить больше 5 ответов');
                                return;
                            }
                                const container = document.getElementById('answers');
                                let label = document.createElement('label');
                                label.textContent = 'Текст ответа';
                                label.className = 'col-8';
                                let labelRight = document.createElement('label');
                                labelRight.textContent = 'Верный ответ';
                                labelRight.className = 'col-4';
                                let input = document.createElement('input');
                                input.placeholder = 'Введите ответ';
                                input.className = 'col-8 form-control-ans bg-white mb-2'
                                input.name = 'ans' + (inputCount + 2);
                                let inputRight = document.createElement('input');
                                inputRight.type = 'checkbox';
                                inputRight.className = 'col-4 form-check-input'
                                inputRight.name = 'ans' + (inputCount + 2) + 'Right';
                                container.appendChild(label);
                                container.appendChild(labelRight);
                                container.appendChild(input);
                                container.appendChild(inputRight);
                            "
                                    type="button" class="btn-img"><img class="img-size" src="/images/plus.png"></button>
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



    @foreach($questions as $el)
        <div class="row question-wrap">
            <h5>{{$el->text_question}}</h5>

            <p>{{$el->complexity==0 ? "Easy" : ($el->complexity==1 ? "Medium" : "Hard")}}</p>

{{--            <td>{{$el->answer_text}}</td>--}}

            @foreach($answers as $answer)
                @if($answer->id_question == $el->id)
                    <li>{{$answer->text_answer}}</li><br/>
                @endif
            @endforeach

        <div class="btn-centre">
            <button type="button" class="btn-img"><img class="img-size" src="/images/pen.png"></button>
            <button type="button" class="btn-img"><img class="img-size" src="/images/delete.png"></button>
        </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script>
        let maxInputAllowed = 5;
        let inputCount = 0;
    </script>
@endsection
