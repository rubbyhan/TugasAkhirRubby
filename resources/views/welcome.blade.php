@extends('app')
@section('content')
    <div class="container">
    <h1 class="text-center">Langkah-Langkah mengisi: </h1>
    <h1 class="text-center">1. Isilah sesuai dengan kepribadian anda/h1>
    <h1 class="text-center">2. Setelah mengisi dimohon untuk mengisi kuisioner yang ada dihalaman akhir</h1>
        <form action="{{ route('test.start') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-success btn-block">Start Test</button>
        </form>
    </div>
@stop
