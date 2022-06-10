@extends('layouts.dashboard-layout')


@section('content')
    <div id="welcome">
        <h2>Welcome</h2>
        <p>Don't wait longer. Start to:</p>
        <div class="bar-template row p-3 my-auto shadow align-items-center mb-5">
            <div class="col-xl-8 col-lg-6 my-auto">
                <h4>Connect your NetApp to the marketplace</h4>
                <p class="mb-xl-0 mb-lg-4">If you have already used the <a href="https://evolved5g-cli.readthedocs.io/en/latest/" target="_blank">guide</a> and you already have Evolved&#8209;5G netapp created, click the upload button to connect to the marketplace.</p>
            </div>
            <div class="col-xl-4 col-lg-6">
                <a href="{{ route('create-netapp') }}" class="mouse-cursor-gradient-tracking btn btn--blue">Upload to the marketplace!</a>


            </div>

        </div>

        <div class="bar-template row p-3 my-auto shadow align-items-center mb-5">
            <div class="col-xl-8 col-lg-6 my-auto">
                <h4>Buy a NetApp</h4>
                <p class="mb-xl-0 mb-lg-4">Search through product catalogue.</p>
            </div>
            <div class="col-xl-4 col-lg-6">
                <a href="{{ route('product-catalogue') }}" class="mouse-cursor-gradient-tracking btn btn--blue">Go to product catalogue</a>
            </div>

        </div>
    </div>
@endsection

