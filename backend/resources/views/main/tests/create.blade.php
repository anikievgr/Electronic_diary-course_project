@extends('../main/app')
@section('style')
    @vite(['resources/css/mainTests.css'])
@endsection
@section('content')
    <div class="row" >
        @csrf
        <div class="col-md-8 mx-auto ">
            <div class="mainCardHeader card">
                <form method="post" action="{{route('crudTestPage.store')}}">
                    <div class="basicDataTest">
                        <label>Назвавние:<input class="mainInput" type="text" name="name" placeholder="Назвавние"></label>
                        <label>Время на прохождение:<input class="mainInput" name="time" type="integer" placeholder="Время на прохождение"></label>
                        <label>Количество вопросов: 1</label>
                        <button type="submit" class="addQuestion">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                            Добавить вопрос
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8 mx-auto mt-5">
            <div class="mainCardHeader card">
                <form method="post" class="w-100" action="{{route('question.store')}}">
                   <div class="test">
                       <div>
                           <label>Вопрос:</label>
                           <br>
                           <input class="mainInput w-100" type="text" name="questions" placeholder="Вопрос">
                       </div>
                       <br>
                       <div class="answers">
                           <label>Ответы:</label>
                           <br>
                           <label>
                               <input type="checkbox" name="firstAnswerCheckbox">
                               <input class="mainInput mx-3  w-100" type="text" name="firstAnswer" placeholder="Ответ">
                            </label>
                           <label>
                               <input type="checkbox" name="secondAnswerCheckbox">
                               <input class="mainInput mx-3  w-100" type="text" name="secondAnswer" placeholder="Ответ">
                           </label>
                           <label>
                               <input type="checkbox" name="thirdAnswerCheckbox">
                               <input class="mainInput mx-3  w-100" type="text" name="thirdAnswer" placeholder="Ответ">
                           </label>
                           <label>
                               <input type="checkbox" name="fourthAnswerCheckbox">
                               <input class="mainInput mx-3  w-100" type="text" name="fourthAnswer" placeholder="Ответ">
                           </label>
                       </div>
                       <p>Правиьльный ответ отметье галочкой</p>
                       <button type="submit" class="addQuestion">
                           Отправить
                       </button>
                   </div>

                </form>
            </div>
        </div>
    </form>
@endsection
