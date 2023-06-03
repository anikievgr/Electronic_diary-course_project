{{--{{$numberCorrectUserResponses}}--}}
@extends('../main/app')
@section('style')

    @vite(['resources/css/result.css'])
@endsection
@section('content')
    <div class="row">
        <div class="cardResult">
            <div class="result">
                <p>{{$numberCorrectUserResponses}}%</p>
                <a href="{{route('searchTests.index')}}">На главную</a>
            </div>

        </div>
    </div>
@endsection
