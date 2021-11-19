@extends('app')
@section('content')
    <div class="container">
        <h1 class="text-center">You are more suitable to work as</h1>
        <h4 class="text-center">{{ $response['RecomJobs1'] }} or {{ $response['RecomJobs2'] }}</h4>
        <h1 class="text-center">You are</h1>
        <h4 class="text-center">{{ $response['RIASEC1'] }}, {{ $response['RIASEC2'] }}, and {{ $response['RIASEC3'] }}</h4>
        <h4 class="text-center">{{ $response['IE'] }}, {{ $response['SN'] }}, {{ $response['TF'] }}, {{ $response['PJ'] }}</h4>
        <a href="{{ route('index') }}" class="btn btn-success btn-lg btn-block">Restart Test</a>
    </div>
@endsection
