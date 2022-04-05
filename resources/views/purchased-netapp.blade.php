@extends('layouts.dashboard-layout')
@section('content')
<div id="history-purchased">
    <div class="table-responsive mb-5">
        <h4>History purchased</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date of purchase</th>
                    <th scope="col">Blockchain URL</th>
                    <th scope="col">Netapp Page</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td> {{\Carbon\Carbon::parse($myPurchasedNetapp->created_at)->isoFormat('D MMM YYYY - H:ss')}}</td>
                    <td>
                        <a href="{{ $myPurchasedNetapp->blockchain_transaction_url }}" target="_blank">
                            {{ parse_url($myPurchasedNetapp->blockchain_transaction_url, PHP_URL_HOST) }} <i class="fa-solid fa-up-right-from-square mx-1"></i></a>
                    </td>
                    <td>
                        <a href="{{ route('show-netapp', $myPurchasedNetapp->netapp->slug) }}" target="_blank">
                            View NetApp "{{ $myPurchasedNetapp->netapp->name }}" page
                        </a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>



</div>
@endsection
