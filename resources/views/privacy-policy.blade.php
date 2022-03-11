@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ mix('dist/css/home.css') }}">
@endpush

@section('content')

<body>

    <div class="container-fluid" style="margin-top:100px;display:flex;justify-content:center;">
        <h1>Under Development</h1>
    </div>
</body>
@endsection
@push('scripts')
<script src="{{ mix('dist/js/home.js') }}"></script>
@endpush