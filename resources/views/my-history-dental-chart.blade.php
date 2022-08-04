@extends('layouts.user')

@section('content')

    @auth
        <my-history-dental-chart prop-admit-id={{ $admitid }}></my-history-dental-chart>

    @endauth

@endsection
