@extends('app')
@section('content')
    <div class="container">
        <h1 class="text-center">{{ $question['question'] }}</h1>
        <h3 class="text-center">{{ $questionNumber }} of {{ $totalQuestion }}</h3>
        <form action="{{ route('test.submit', $code) }}" method="post">
            @csrf
            <div class="row" style="transition-delay: 2s;">
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn-lg btn-primary" value="0" name="answer">{{ $question['optionA'] }}</button>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn-lg btn-danger" value="1" name="answer">{{ $question['optionB'] }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
