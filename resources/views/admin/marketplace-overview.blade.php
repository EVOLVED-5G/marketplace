@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ mix('dist/css/admin-dashboard.css') }}">
@endpush

@section('content')
<marketplace-overview :total-purchase="{{$totalPurchase}}" :total-netapps="{{$totalNetapps}}" :total-users="{{$totalUsers}}" :total-compnies="{{$totalCompnies}}"></marketplace-overview>
@endsection