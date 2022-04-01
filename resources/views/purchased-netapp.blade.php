@extends('layouts.dashboard-layout')
@section('content')
<div id="history-purchased">
    <div class="table-responsive mb-5">
        <h4>History purchased</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date of purchace </th>
                    <th scope="col">Blockchain confirmation</th>
                    <th scope="col">Blockchain confirmation</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td> {{\Carbon\Carbon::parse($myPurchasedNetapp->created_at)->isoFormat('D MMM YYYY')}}</td>
                    <td>
                        <a href="#">link</a> (#okasdaef)
                    </td>
                    <td>
                        <a href="#">View NetApp 1 page</a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>



</div>
@endsection