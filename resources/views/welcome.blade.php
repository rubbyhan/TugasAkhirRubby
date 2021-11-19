@extends('app')
@section('content')
    <div class="container">
        <form action="{{ route('test.start') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-success btn-block">Start Test</button>
        </form>
    </div>
@stop
