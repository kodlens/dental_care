@extends('layouts.user')

@section('content')
    <welcome-page></welcome-page>


    @auth
        <services-component></services-component>
    @endauth

@endsection
