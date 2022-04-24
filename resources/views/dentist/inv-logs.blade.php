@extends('layouts.dentist-app')

@section('content')
    <inv-logs prop-patient-id={{ $patient }} prop-app-id={{ $appid }} prop-service-id={{ $service }}></inv-logs>
@endsection

