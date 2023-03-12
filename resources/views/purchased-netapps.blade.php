@php use Carbon\Carbon; @endphp
@extends('layouts.dashboard-layout')
@section('content')
    <div id="history-purchased">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col p-0">
                    <div class="table-responsive mb-5">
                        <h4>My purchases</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date of purchase</th>
                                <th scope="col">Digital signature</th>
                                <th scope="col">Network App</th>
                                <th scope="col">GitHub URL</th>
                                <th scope="col">Download Docker image </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($purchasedNetApps as $purchasedNetApp)
                                <tr>
                                    <th scope="row">1</th>
                                    <td> {{Carbon::parse($purchasedNetApp->created_at)->format('d/m/Y H:i')}}</td>
                                    <td id="digital-signature">
                                        <a href="{{ $purchasedNetApp->blockchain_transaction_url ?? '#' }}"
                                           target="_blank">
                                            {{ $purchasedNetApp->hash }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('show-netapp', $purchasedNetApp->netapp->slug) }}"
                                           target="_blank">
                                            {{ $purchasedNetApp->netapp->name }}
                                        </a>
                                    </td>
                                    <td>
                                        @if($purchasedNetApp->netapp->github_url)
                                            <a href="{{ $purchasedNetApp->netapp->github_url }}" target="_blank">
                                                URL
                                            </a>
                                        @endif
                                        @if($purchasedNetApp->netapp->license
                                            && $purchasedNetApp->netapp->license->first()
                                            && $purchasedNetApp->netapp->license->first()->url
                                            && $purchasedNetApp->netapp->docker_image_url)
                                            ,
                                        @endif
                                        @if($purchasedNetApp->netapp->license
                                            && $purchasedNetApp->netapp->license->first()
                                            && $purchasedNetApp->netapp->license->first()->url)
                                            <a href="{{ $purchasedNetApp->netapp->license->first()->url }}"
                                               target="_blank">
                                                licence
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/netapps/purchased/download/?url={{ $purchasedNetApp->netapp->docker_image_url }}" >
                                            Download
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if($purchasedNetApps->isEmpty())
                <div class="row mt-5">
                    <div class="col p-5 bg-white">
                        <div class="text-center">
                            <h6 id="no-net-apps">You haven't purchased any Network Apps, yet.</h6>
                            <h4><a href="{{ route('product-catalogue') }}">Go to the product catalogue!</a></h4>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection
