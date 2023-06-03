@extends('../main/app')
@section('style')
    @vite(['resources/css/mainTests.css'])
@endsection
@section('content')
    <form id="form" action="{{route('startTest.checkAnswer', $test[0]->id)}}" class="row">
        @csrf
        <div class="col-md-8 mx-auto ">
            <div class="mainCardHeader card">
                <div class="basicDataTest">
                    <p>{{$test[0]->name}}</p>
                    <p >Время: <span id="time">{{$test[0]->time}}</span></p>
                </div>
            </div>

        </div>
        @foreach($test as $questions)
            @if(!empty($questions->questions) )
                @foreach($questions->questions as $question)
                        <div class="col-md-8 mx-auto mt-5">
                            <div class="mainCardHeader card">
                                <div class="test w-100">
                                    <div>
                                        <input class="mainInput w-100" type="text" name="questions" placeholder="Вопрос" value="{{$question->questions}}"  disabled="disabled">
                                    </div>
                                    <br>
                                    <div class="answers">
                                        <label>Ответы:</label>
                                        <br>
                                        <label>
                                                <input type="checkbox" name="q{{$question->id}}a{{$question->answers[0]->id}}">
                                                <input class="mainInput mx-3  w-100" type="text"  value="{{$question->answers[0]->answer}}" placeholder="Ответ"  disabled="disabled">
                                        </label>
                                        <label>
                                            <input type="checkbox" name="q{{$question->id}}a{{$question->answers[1]->id}}">
                                            <input class="mainInput mx-3  w-100" type="text"  value="{{$question->answers[1]->answer}}" placeholder="Ответ"  disabled="disabled">
                                        </label>
                                        <label>
                                            <input type="checkbox" name="q{{$question->id}}a{{$question->answers[2]->id}}">
                                            <input class="mainInput mx-3  w-100" type="text" value="{{$question->answers[2]->answer}}" placeholder="Ответ"  disabled="disabled">
                                        </label>
                                        <label>
                                            <input type="checkbox" name="q{{$question->id}}a{{$question->answers[3]->id}}">
                                            <input class="mainInput mx-3  w-100" type="text"  value="{{$question->answers[3]->answer}}" placeholder="Ответ"  disabled="disabled">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            @endif

        @endforeach
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary mt-5 " data-bs-toggle="modal" data-bs-target="#myModal" style="width: 66%; margin: 0 auto; margin-bottom: 30px">Завершить</button>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Завершение</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Вы точно хотите завершить тест?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary" data-bs-dismiss="modal">Да</button>
                    </div>

                </div>
            </div>
        </div>
        </br>
    </form>
@endsection
@section('js')
    @vite(['resources/js/test.js'])
@endsection
