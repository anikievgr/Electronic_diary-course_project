@extends('../main/app')
@section('style')
    @vite(['resources/css/mainTests.css'])
    @vite(['resources/css/card.css'])
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto ">
            <div class="mainCardHeader card">
                <span>Мои Тесты:</span>
                <a href="{{route('crudTestPage.create')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>
                    Создать Новый
                </a>
            </div>
        </div>
        <div class="col-md-8 mx-auto d-flex justify-content-between mt-2 flex-wrap">
    @foreach($tests as $user)
        @foreach($user->tests as $test)
                    <div class="mainCard card">
                        <p>Тест</p>
                        <div class="inputs">
                            <label>Название:</label>
                            <input class="mainInput" type="text"  disabled="disabled" value="{{$test->name}}">
                            <label >Время на решение</label>
                            <input class="mainInput" type="text"  disabled="disabled" @if($test->time) value="{{$test->time}}" @else  value="нет" @endif>

                            <a href="{{route('crudTestPage.show', $test->id)}}" >@if($test->redoction_status) Просмотр @else Изменить @endif </a>
                            <br>
                            <a href="{{route('crudTestPage.delete', $test->id)}}" >Удалить</a>
                        </div>
                    </div>
            @endforeach
    @endforeach
                </div>
    </div>
@endsection
