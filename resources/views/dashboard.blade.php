@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ mix('dist/css/dashboard.css') }}">
@endpush

@section('content')
<createnetapp :categories='{{json_encode($categories)}}' :types='{{json_encode($types)}}'></createnetapp>


@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nanobar/0.4.2/nanobar.min.js"></script>

<script src="{{ mix('dist/js/dashboard.js') }}"></script>
@endpush
