@extends('layouts.no-navbar')
@section('content')
    @auth
        <home-page prop-user='@json($user)'></home-page>
    @else
        <home-page prop-user=''></home-page>
    @endauth



@endsection
