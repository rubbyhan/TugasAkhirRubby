@extends('app')
@section('content')
    <div class="container">
        <h1 class="text-center">Rekomendasi pekerjaan anda</h1>
        <h4 class="text-center">{{ $response['RecomJobs1'] }} atau {{ $response['RecomJobs2'] }}</h4>
        <h1 class="text-center">You are</h1>
        <h4 class="text-center">{{ $response['RIASEC1'] }}, {{ $response['RIASEC2'] }}, and {{ $response['RIASEC3'] }}</h4>
        <h4 class="text-center">{{ $response['IE'] }}, {{ $response['SN'] }}, {{ $response['TF'] }}, {{ $response['PJ'] }}</h4>
        <h1 class="text-center">Di mohon untuk mengisi kuisioner berikut</h1>
        <a  class="text-center" href="https://docs.google.com/forms/d/e/1FAIpQLSf_KdF9MFZ7XIejOHHLafUTG3OJbq9ecRif8VvNfsAgfKj_aw/viewform?usp=sf_link">kuisioner</a>
        <a href="{{ route('index') }}" class="btn btn-success btn-lg btn-block">Restart Test</a>
    </div>
@endsection
