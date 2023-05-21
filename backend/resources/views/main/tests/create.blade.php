@extends('../main/app')
@section('style')
    @vite(['resources/css/mainTests.css'])
@endsection
@section('content')
    <form method="post" action="{{route('crudTestPage.store')}}" class="row" >
        @csrf
        <div class="col-md-8 mx-auto ">
            <div class="mainCardHeader card">
                <div class="basicDataTest">
                    <label @error('name') class="error" @enderror>Назвавние:<input class="mainInput" type="text" name="name" placeholder="Назвавние" value="{{old('name')}}"></label>
                    <label>Время на прохождение:<input class="mainInput" name="time" type="integer" placeholder="Время на прохождение в мин:"></label>
                    <label>Количество вопросов: 1</label>
                    <button type="submit" class="addQuestion">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                        Добавить вопрос
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-8 mx-auto mt-5">
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
                       Отправить
                   </button>
               </div>
            </div>
        </div>
    </form>
@endsection
