@extends('layouts.user')

@section('content')
    
    @auth
        <my-appointment></my-appointment>
    @endauth

@endsection
