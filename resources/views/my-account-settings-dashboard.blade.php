@extends('layouts.dashboard-layout')


@section('content')
    <div id="my-account-settings">

        <div class="mb-3">
            <h4>Settings</h4>

            <a href="#">Edit</a>
        </div>
        <div class="mb-5">
            <p class="mb-0">Personal Info</p>
            <hr class="mt-0">
            <form class="row g-3">
                <div>
                    <label for="user-name" class="form-label text-details">Name</label>

                    <input type="text" class="form-control" id="user-name" data-vv-rules="required" name="name"
                        placeholder="Erik" />
                </div>
                <div>
                    <label for="user-surname" class="form-label text-details">Surame</label>
                    <input type="text" class="form-control" id="user-surname" data-vv-rules="required" name="name"
                        placeholder="Chris" />
                </div>

                <div>
                    <label for="occupation" class="form-label text-details">Occupation</label>
                    <input type="text" class="form-control" id="occupation" data-vv-rules="required" name="name"
                        placeholder="...." />
                </div>

                <div>
                    <label for="profile-image" class="form-label text-details">Profile
                        image</label>

                </div>
            </form>
        </div>

        <div class="mb-5">
            <p class="mb-0">Account info</p>
            <hr class="mt-0">
            <form class="row g-3">
                <div>
                    <label for="account-email" class="form-label">e-mail</label>
                    <input type="email" class="form-control" id="account-email" aria-describedby="emailHelp"
                        placeholder="ssdd@gmail.com">
                </div>
                <div>
                    <label for="username" class="form-label text-details">Username</label>
                    <input type="text" class="form-control" id="username" data-vv-rules="required" name="name"
                        placeholder="....." />
                </div>

                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="**********">
                </div>

            </form>
        </div>

        <div class="mb-5">
            <p class="mb-0">Organization info</p>
            <hr class="mt-0">
            <form class="row g-3">
                <div>
                    <label for="οrganization-surname" class="form-label text-details">Business/Organization
                        Name</label>
                    <input type="text" class="form-control" id="οrganization-surname" data-vv-rules="required"
                        name="name" />
                </div>
                <div>
                    <label for="social-number" class="form-label text-details">Social
                        number</label>
                    <input type="text" class="form-control" id="social-number" data-vv-rules="required" name="name" />
                </div>



            </form>
        </div>

        <div class="step-actions mt-5">
            <div class="btn btn--tertiary" type="button">
                Cancel
            </div>
            <div class="btn btn--blue ms-5" type="button">
                Update
            </div>


        </div>
    </div>
@endsection
