@extends('layouts.dashboard-layout')


@section('content')
<form class="row g-3" action="{{route('update.user.details')}}" method="post">
    <div id="my-account-settings">

        <div class="mb-3">
            <h4>Settings</h4>

            <a href="#">Edit</a>
        </div>
        <div class="mb-5">
            <p class="mb-0">Personal Info</p>
            <hr class="mt-0">
            @csrf
            <div>
                <label for="user-name" class="form-label text-details">Full Name</label>

                <input type="text" class="form-control" id="user-name" data-vv-rules="required" name="name" placeholder="Erik" value="{{$user->name}}" />
            </div>
            {{-- <div>
                <label for="user-surname" class="form-label text-details">Surame</label>
                <input type="text" class="form-control" id="user-surname" data-vv-rules="required" name="surnmae" placeholder="Chris" />
            </div>

            <div>
                <label for="occupation" class="form-label text-details">Occupation</label>
                <input type="text" class="form-control" id="occupation" data-vv-rules="required" name="occupation" placeholder="...." />
            </div>

            <div>
                <label for="profile-image" class="form-label text-details">Profile
                    image</label>

            </div> --}}

        </div>

        <div class="mb-5">
            <p class="mb-0">Account info</p>
            <hr class="mt-0">
            <div>
                <label for="account-email" class="form-label">e-mail</label>
                <input type="email" class="form-control" id="account-email" name="email" aria-describedby="emailHelp" placeholder="ssdd@gmail.com" value="{{$user->email}}">
            </div>
            <!-- <div>
                <label for="username" class="form-label text-details">Username</label>
                <input type="text" class="form-control" id="username" data-vv-rules="required" name="name" placeholder="....." />
            </div> -->
            <!--
            <div>
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="**********">
            </div> -->

        </div>

        <div class="mb-5">
            <p class="mb-0">Organization info</p>
            <hr class="mt-0">
            <div>
                <label for="οrganization-surname" class="form-label text-details">Business/Organization
                    Name</label>
                <input type="text" class="form-control" id="οrganization-surname" data-vv-rules="required" name="business" value="{{$user->business_name}}"/>
            </div>
            <div>
                <label for="social-number" class="form-label text-details">Social
                    number</label>
                <input type="text" class="form-control" id="social-number" data-vv-rules="required" name="social_number" value="{{$user->social_number}}"/>
            </div>



        </div>

        <div class="step-actions mt-5">
            <div class="btn btn--tertiary me-5 mb-4" type="button">
                Cancel
            </div>
            <button class="btn btn--blue mb-4" type="submit">
                Update
            </button>


        </div>
    </div>
</form>
@endsection
