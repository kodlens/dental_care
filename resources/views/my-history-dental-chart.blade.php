@extends('layouts.user')

@section('content')
    
    @auth
        <my-history-dental-chart prop-admit_id="{{ $admit_id }}"></my-history-dental-chart>
    @endauth

@endsection
