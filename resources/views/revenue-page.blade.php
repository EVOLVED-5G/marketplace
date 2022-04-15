@extends('layouts.dashboard-layout')


@section('content')
    <div id="total-purchases">
        <div id="total-purchases-box" class="box-template">
            <div class="box-template__number ps-3  mb-5 d-flex flex-column justify-content-center">
                <p class="text-note">Total purchases</p>
                <h2>{{$purchasedNetApps->count()}}</h2>
            </div>

            <div class="table-responsive">
                <h4>History</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date of purchase</th>
                        <th scope="col">Buyer's email</th>
                        <th scope="col">Blockchain confirmation</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($purchasedNetApps as $purchasedNetApp)
                        <tr>
                            <th scope="row">1</th>
                            <td> {{\Carbon\Carbon::parse($purchasedNetApp->created_at)->isoFormat('D MMM YYYY - H:ss')}}</td>
                            <td> {{$purchasedNetApp->user->email}}</td>
                            <td>
                                <a href="{{ $purchasedNetApp->blockchain_transaction_url }}" target="_blank">
                                    {{ parse_url($purchasedNetApp->blockchain_transaction_url, PHP_URL_HOST) }} <i
                                        class="fa-solid fa-up-right-from-square mx-1"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>You haven't sold any NetApps, yet.</tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
