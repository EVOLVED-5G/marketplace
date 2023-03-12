@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('dist/css/admin-dashboard.css') }}">
@endpush

@section('content')
    <div class="admin-page">
        <div class="content">
            <h3>Marketplace overview</h3>
            <div class="d-flex flex-wrap  justify-content-between">
                <div id="total-netapps-created-box" class="box-template">
                    <div class="box-template__number ps-3  mb-5 d-flex flex-column justify-content-center">
                        <p class="text-note">Total NetApps have been created</p>
                        <h2>2</h2>
                    </div>
                </div>

                <div id="total-users-box" class="box-template">
                    <div class="box-template__number ps-3  mb-5 d-flex flex-column justify-content-center">
                        <p class="text-note">Total users</p>
                        <h2>5</h2>
                    </div>
                </div>

                <div id="total-companies-box" class="box-template">
                    <div class="box-template__number ps-3  mb-5 d-flex flex-column justify-content-center">
                        <p class="text-note">Total companies</p>
                        <h2>2</h2>
                    </div>
                </div>

                <div id="total-purchases-box" class="box-template">
                    <div class="box-template__number ps-3  mb-5 d-flex flex-column justify-content-center">
                        <p class="text-note">Total purchases</p>
                        <h2>7</h2>
                    </div>
                </div>

            </div>

            <div id="total-netapps-created">
                <div class="table-responsive mb-5">
                    <p>Results</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Version</th>
                                <th scope="col">Registration Date</th>
                                <th scope="col">Availability</th>
                                <th scope="col">Contact</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">NetApp 1</th>
                                <td> V 0.2</td>
                                <td>
                                    4 Dec 2021
                                </td>
                                <td>
                                    Visible to maketplace
                                </td>
                                <td>
                                    Mail@gmail.com
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">NetApp 2</th>
                                <td> V 0.1</td>
                                <td>
                                    1 Dec 2020
                                </td>
                                <td>
                                    Visible to maketplace
                                </td>
                                <td>
                                    Mail@gmail.com
                                </td>


                            </tr>

                            <tr>
                                <th scope="row">NetApp 3</th>
                                <td> V 0.1</td>
                                <td>
                                    1 Nov 2019
                                </td>
                                <td>
                                    Visible to maketplace
                                </td>
                                <td>
                                    Mail@gmail.com
                                </td>


                            </tr>
                        </tbody>
                    </table>
                </div>



            </div>

            <div id="total-users">
                <div class="table-responsive mb-5">
                    <p>Results</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">e-mail</th>
                                <th scope="col">Number of Network Apps created</th>
                                <th scope="col">Number of Network Apps purchased</th>
                                <th scope="col">Last Login</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Erik Chris</th>
                                <td>Mail@gmail.com</td>
                                <td>
                                    7
                                </td>
                                <td>
                                    10
                                </td>
                                <td>
                                    4 Dec 2021
                                </td>

                            </tr>

                            <tr>
                                <th scope="row">Alex TZoumas</th>
                                <td>Mail@gmail.com</td>
                                <td>
                                    3
                                </td>
                                <td>
                                    8
                                </td>
                                <td>
                                    4 Dec 2021
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">Erik Chris</th>
                                <td>Mail@gmail.com</td>
                                <td>
                                    4
                                </td>
                                <td>
                                    7
                                </td>
                                <td>
                                    4 Dec 2021
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>



            </div>


            <div id="total-companies">
                <div class="table-responsive mb-5">
                    <p>Results</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Company Name</th>
                                <th scope="col">logo</th>
                                <th scope="col">Number of Net apps created</th>
                                <th scope="col">Number of Net apps purchased</th>
                                <th scope="col">Contact Email</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">SciFY</th>
                                <td>
                                    <img src="img/logo-menu.png" alt="logo">
                                </td>
                                <td>
                                    7
                                </td>
                                <td>
                                    10
                                </td>
                                <td>
                                    scify@gmail.com
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">Maggioli</th>
                                <td>
                                    <img src="img/scify_logo.png" alt="scify_logo">
                                </td>
                                <td>
                                    5
                                </td>
                                <td>
                                    1
                                </td>
                                <td>
                                    maggioli@gmail.com
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">SciFY</th>
                                <td>
                                    <img src="img/netapp-creators-title.png" alt="logo">
                                </td>
                                <td>
                                    7
                                </td>
                                <td>
                                    10
                                </td>
                                <td>
                                    scify@gmail.com
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>



            </div>

            <div id="total-purchases-table">
                <div class="table-responsive mb-5">
                    <p>Results</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Network App name</th>
                                <th scope="col">Date of Purchase</th>
                                <th scope="col">Network App creator email</th>
                                <th scope="col">Buyer’s email</th>
                                <th scope="col">Blockchain confirmation</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">SciFY</th>
                                <td>4 Dec 2021</td>
                                <td>
                                    maggioli@gmail.com
                                </td>
                                <td>
                                    devel@gmail.com
                                </td>
                                <td>
                                    <a href="#">link</a>
                                </td>

                            </tr>

                            <tr>
                                <th scope="row">Maggioli</th>
                                <td>4 Dec 2021</td>
                                <td>
                                    maggioli@gmail.com
                                </td>
                                <td>
                                    devel@gmail.com
                                </td>
                                <td>
                                    <a href="#">link</a>
                                </td>

                            </tr>

                            <tr>
                                <th scope="row">SciFY</th>
                                <td>4 Dec 2021</td>
                                <td>
                                    maggioli@gmail.com
                                </td>
                                <td>
                                    devel@gmail.com
                                </td>
                                <td>
                                    <a href="#">link</a>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>



            </div>

        </div>
    </div>
@endsection
