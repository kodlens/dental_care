@extends('layouts.user')

@section('content')
    
    @auth
        <my-appointment prop-services='@json($services)'></my-appointment>
    @endauth

@endsection
