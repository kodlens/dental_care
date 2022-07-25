@extends('layouts.user')

@section('content')
    <welcome-page></welcome-page>

    

    @auth
        <booking-component></booking-component>

        <services-component></services-component>
    @endauth

@endsection
