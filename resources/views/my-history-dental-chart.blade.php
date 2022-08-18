@extends('layouts.user')

@section('content')

    @auth
        <my-history-dental-chart prop-admit-id={{ $admitid }} prop-data='@json($data)'></my-history-dental-chart>

    @endauth

@endsection
