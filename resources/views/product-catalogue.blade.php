@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ mix('dist/css/product-catalogue.css') }}">
@endpush

@section('content')
<section class="product-title d-flex align-items-center justify-content-center">
    <h1>Product catalogue</h1>

</section>
<product-catalog :categories="{{json_encode($categories)}}" :types="{{json_encode($types)}}" :Tags="{{ json_encode($uniqueTags) }}" @if(auth()->user()) :user="{{auth()->user()->id}}" @else user="" @endif></product-catalog>

@endsection
@push('scripts')
@endpush