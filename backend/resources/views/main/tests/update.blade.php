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
        <form  method="post" action="{{route('crudTestPage.createQuestion',$test[0]->id)}}" class="col-md-8 mx-auto mt-5">
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
                                                    <input class="mainInput mx-3  w-100" type="text"  placeholder="Ответ" value="{{$answer->answer}}" disabled="disabled">
                                                </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            @endif
        @endforeach
    </div>
@endsection
