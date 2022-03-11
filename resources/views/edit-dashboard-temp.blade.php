@extends('layouts.dashboard-layout')
@push('css')
<link rel="stylesheet" href="{{ mix('dist/css/support.css') }}">
<link rel="stylesheet" href="{{ mix('dist/css/netapp-single.css') }}">

@endpush

@section('content')
<edit-netapp :netapp='{{json_encode($netapp)}}' :categories='{{json_encode($categories)}}' :types='{{json_encode($netappType)}}'></edit-netapp>
@endsection
@push('scripts')
@endpush