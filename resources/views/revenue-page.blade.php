@extends('layouts.dashboard-layout')


@section('content')
<div id="total-purchases">
    <div id="total-purchases-box" class="box-template">
        <div class="box-template__number ps-3  mb-5 d-flex flex-column justify-content-center">
            <p class="text-note">Total purchases</p>
            <h2>{{$totalPurchase}}</h2>
        </div>

        <div class="table-responsive">
            <h4>History</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date of purchace </th>
                        <th scope="col">Buyer's email</th>
                        <th scope="col">Blockchain confirmation</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($purchasedNetapps as $purchasedNetapp)
                    <tr>
                        <th scope="row">1</th>
                        <td> 04 Dec 2021</td>
                        <td> {{$purchasedNetapp->user->email}}</td>
                        <td>
                            <a href="#"> link</a>
                            (#okasdaef)
                        </td>
                    </tr>
                    @empty
                    <tr>Empty</tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection