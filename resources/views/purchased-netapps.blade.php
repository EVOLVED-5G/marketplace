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
                                <th scope="col">NetApp</th>
                                <th scope="col">Docker image <a class="ml-1" href="{{ config('app.forum_url') }}"
                                                                target="_blank"
                                                                title="Go to the forum for support in using docker images">
                                        <i class="fas fa-question-circle"></i></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($purchasedNetApps as $purchasedNetApp)
                                <tr>
                                    <th scope="row">1</th>
                                    <td> {{\Carbon\Carbon::parse($purchasedNetApp->created_at)->isoFormat('D MMM YYYY - H:ss')}}</td>
                                    <td>
                                        <a href="{{ $purchasedNetApp->blockchain_transaction_url }}" target="_blank">
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
                                        @if($purchasedNetApp->netapp->docker_image_url)
                                            <a href="{{ $purchasedNetApp->netapp->docker_image_url }}" target="_blank">
                                                URL
                                            </a>
                                        @endif
                                        @if($purchasedNetApp->netapp->license
                                            && $purchasedNetApp->netapp->license->first()
                                            && $purchasedNetApp->netapp->license->first()->url
                                            && $purchasedNetApp->netapp->certificate_url)
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
                            <h6 id="no-net-apps">You haven't purchased any NetApps, yet.</h6>
                            <h4><a href="{{ route('product-catalogue') }}">Go to the product catalogue!</a></h4>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection
