@extends('layouts.dashboard-layout')


@section('content')

<div id="total-purchases">
    <div id="total-purchases-box" class="box-template">
        <div class="box-template__number ps-3  mb-5 d-flex flex-column justify-content-center">
            <p class="text-note">Total purchases</p>
            <h2>2</h2>
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
                    <tr>
                        <th scope="row">1</th>
                        <td> 04 Dec 2021</td>
                        <td> alexandros.tzoumas@gmaill.com</td>
                        <td>
                            <a href="#"> link</a>
                            (#okasdaef)
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>06 Dec 2021 </td>
                        <td>john.karadimas@maggioli.gr</td>
                        <td>
                            <a href="#"> link</a>
                            (#okasdaef)
                        </td>

                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>06 Dec 2021 </td>
                        <td>john.karadimas@maggioli.gr</td>
                        <td>
                            <a href="#"> link</a>
                            (#okasdaef)
                        </td>

                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>

    <div id="saved-items">
        <div class="table-responsive mb-5">
            <h4>History</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td> NetApp 1</td>
                        <td>
                            <a href="#">View NetApp</a>
                        </td>
                        <td>
                            <a href="#">Remove from list</a>
                        </td>

                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>NetApp 2 </td>
                        <td>
                            <a href="#">View NetApp</a>
                        </td>
                        <td>
                            <a href="#">Remove from list</a>
                        </td>


                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>NetApp 3</td>
                        <td>
                            <a href="#">View NetApp</a>
                        </td>
                        <td>
                            <a href="#">Remove from list</a>
                        </td>


                    </tr>

                </tbody>
            </table>
        </div>

        <div class="no-items-saved text-center p-5">
            <p class="text-details"><i>No items saved</i></p>
            <a href="#">Go to product catalogue!</a>
        </div>

    </div>

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
                        <td> 04 Dec 2021</td>
                        <td>
                            <a href="#">link</a> (#okasdaef)
                        </td>
                        <td>
                            <a href="#">View NetApp 1 page</a>
                        </td>

                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>04 Dec 2021 </td>
                        <td>
                            <a href="#">link</a> (#okasdaef)
                        </td>
                        <td>
                            <a href="#">View NetApp 1 page</a>
                        </td>


                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>04 Dec 2021</td>
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
