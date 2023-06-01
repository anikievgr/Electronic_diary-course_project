@extends('../main/app')
@section('style')
    @vite(['resources/css/mainTests.css'])
@endsection
@section('content')
    <div class="row">
        @csrf
        <div class="col-md-8 mx-auto ">
            <div class="mainCardHeader card">
                <div class="basicDataTest">
                    <p>{{$test[0]->name}}</p>
                </div>
            </div>
        </div>
        <form  method="post" action="{{route('question.createQuestion',$test[0]->id)}}" class="col-md-8 mx-auto mt-5">
            @csrf
            <div class="mainCardHeader card">
                <div class="test w-100">
                    <div>
                        <label>Вопрос:</label>
                        <br>
                        <input class="mainInput w-100" type="text" name="questions" placeholder="Вопрос" value="{{old('questions')}}">
                        @error('questions') <p class="error">Обязателен к заполнению</p> @enderror
                    </div>
                    <br>
                    <div class="answers">
                        <label>Ответы:</label>
                        <br>
                        <label>
                            <input type="checkbox" name="firstAnswerCheckbox" >
                            <input class="mainInput mx-3  w-100" type="text" name="firstAnswer" placeholder="Ответ" value="{{old('firstAnswer')}}">
                        </label>
                        @error('firstAnswer') <p class="error">Обязателен к заполнению</p>  @enderror
                        <label>
                            <input type="checkbox" name="secondAnswerCheckbox" >
                            <input class="mainInput mx-3  w-100" type="text" name="secondAnswer" placeholder="Ответ" value="{{old('secondAnswer')}}">
                        </label>
                        @error('secondAnswer') <p class="error">Обязателен к заполнению</p>  @enderror
                        <label>
                            <input type="checkbox" name="thirdAnswerCheckbox" >
                            <input class="mainInput mx-3  w-100" type="text" name="thirdAnswer" placeholder="Ответ" value="{{old('thirdAnswer')}}">
                        </label>
                        @error('thirdAnswer') <p class="error">Обязателен к заполнению</p>  @enderror
                        <label>
                            <input type="checkbox" name="fourthAnswerCheckbox" >
                            <input class="mainInput mx-3  w-100" type="text" name="fourthAnswer" placeholder="Ответ" value="{{old('fourthAnswer')}}">
                        </label>
                        @error('fourthAnswer') <p class="error">Обязателен к заполнению</p>  @enderror
                        @if($errors->get('firstAnswerCheckbox') && $errors->get('secondAnswerCheckbox') && $errors->get('thirdAnswerCheckbox') && $errors->get('fourthAnswerCheckbox'))
                            <p class="error">Выберите ответ</p>
                        @endif
                    </div>
                    <p>Правиьльный ответ отметье галочкой</p>
                    <button type="submit" class="addQuestion">
                        Добавить вопрос
                    </button>
                </div>
            </div>
        </form>
        @foreach($test as $questions)
            @if(!empty($questions->questions) )
                @foreach($questions->questions as $question)

                        <div class="col-md-8 mx-auto mt-5">
                            <div class="mainCardHeader card">
                                <div class="test w-100">
                                    <div>
                                        <label>Вопрос:</label>
                                        <br>
                                        <input class="mainInput w-100" type="text" name="questions" placeholder="Вопрос" value="{{$question->questions}}" disabled="disabled">
                                        @error('questions') <p class="error">Обязателен к заполнению</p> @enderror
                                    </div>
                                    <br>
                                    <div class="answers">
                                        <label>Ответы:</label>
                                        <br>
                                        @foreach($question->answers as $key => $answer)
                                            <label>
                                                    <input type="checkbox" name="checkedCheckbox" disabled="disabled" @if($answer->correct_answer) checked @endif>
                                                    <input class="mainInput mx-3  w-100" type="text"  placeholder="Ответ" value="{{$answer->answer}}" @if($answer->correct_answer) style="color:#02c80f " @endif disabled="disabled">
                                                </label>
                                        @endforeach

                                        <a href="{{route('question.deleteAnswer', $question->id)}}" class="trash">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            @endif

        @endforeach
    </div>
@endsection
