@extends('../main/app')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto d-flex">
            <div class="mainCard card">

                <form method="Post" action="{{route('mainProfile.update', auth()->id())}}">
                    @csrf
                    @method('PATCH')
                    <div class="inputs">
                        <label @error('name') class="error" @enderror>Имя:</label>
                        <input class="mainInput" type="text" name="name" class="" value="{{auth()->user()->name}}">
                        <label @error('email') class="error" @enderror>Почта:</label>
                        <input class="mainInput" type="text" name="email" value="{{auth()->user()->email}}">
                        <button type="submit" >Изменить</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
