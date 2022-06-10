@extends('layouts.dashboard-layout')


@section('content')
    <createnetapp :categories='{{json_encode($categories)}}' :types='{{json_encode($types)}}' :business='{{json_encode(auth()->user()->business_name)}}' :social='{{json_encode(auth()->user()->social_number)}}'></createnetapp>


@endsection

