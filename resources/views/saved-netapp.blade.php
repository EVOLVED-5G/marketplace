@extends('layouts.dashboard-layout')


@section('content')
<div id="saved-items">
    @if($saved_netapps->isEmpty())
    <div class="no-items-saved text-center p-5">
        <p class="text-details"><i>No items saved</i></p>
        <a href="#">Go to product catalogue!</a>
    </div>
    @else
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
                @forelse($saved_netapps as $index=>$saved_netapp)
                <template>
                    <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td> {{$saved_netapp->netapp->name}}</td>
                        <td>
                            <a href="{{route('show-netapp',$saved_netapp->netapp->slug)}}">View NetApp</a>
                        </td>
                        <td>
                            <a href="#" @click="unsaveNetapp({{$saved_netapp->id}},true)">Remove From List</a>
                        </td>

                    </tr>
                </template>
                @empty
                @endforelse

            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection