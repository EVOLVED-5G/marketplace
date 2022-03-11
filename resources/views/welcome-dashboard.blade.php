@extends('layouts.dashboard-layout')


@section('content')
    <div id="welcome">
        <h2>Welcome</h2>
        <p>Don't wait longer. Start to:</p>
        <div class="bar-template row p-3 my-auto shadow align-items-center mb-5">
            <div class="col-xl-8 col-lg-7 col-md-6 my-auto">
                <h4>Build a NetApp</h4>
                <p class="mb-0">Create your own NetApp and add it to our marketplace.</p>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6">
                <a href="{{ route('create-netapp') }}" class="btn btn--blue">Create now!</a>


            </div>

        </div>

        <div class="bar-template row p-3 my-auto shadow align-items-center mb-5">
            <div class="col-xl-8 col-lg-7 col-md-6 my-auto">
                <h4>Buy a NetApp</h4>
                <p class="mb-0">Search through product catalogue.</p>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6">
                <a href="{{ route('product-catalogue') }}" class="btn btn--blue">Go to product catalogue</a>
            </div>

        </div>
    </div>
@endsection

