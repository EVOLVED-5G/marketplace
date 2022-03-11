@extends('layouts.dashboard-layout')


@section('content')
    <createnetapp :categories='{{json_encode($categories)}}' :types='{{json_encode($types)}}'></createnetapp>


@endsection

