@extends('../main/app')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto d-flex justify-content-around">
            <div class="mainCard card">
                <p>Основные данные</p>
                <form method="Post" action="{{route('mainProfile.update', auth()->id())}}">
                    @csrf
                    @method('PATCH')
                    <div class="inputs">
                        <label @error('name') class="error" @enderror>Имя:</label>
                        <input class="mainInput" type="text" name="name" value="{{auth()->user()->name}}">
                        <label @error('email') class="error" @enderror>Почта:</label>
                        <input class="mainInput" type="text" name="email" value="{{auth()->user()->email}}">
                        <button type="submit" class="mb-0" >Изменить</button>
                    </div>
                </form>
            </div>

            <div class="mainCard card">
                <p>Сменить парль</p>
                <form method="Post" action="{{route('mainProfile.updatePassword', auth()->id())}}">
                    @csrf
                    <div class="inputs">
                        <label @error('oldPassword') class="error" @enderror>Введите продыдущий пароль:</label>
                        <input class="mainInput" type="text" name="oldPassword" >
                        <label @error('firsPassword') class="error" @enderror>Новый пароль:</label>
                        <input class="mainInput" type="text" name="firsPassword" >
                        <label @error('firsPassword') class="error" @enderror>Повторите новый пароль:</label>
                        <input class="mainInput" type="text" name="secondPassword" >
                        <button type="submit" >Изменить</button>
                    </div>
                </form>
            </div>
        </div
    </div>
@endsection
