@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div
                        class="card-header">{{ __('Register') }}
                    </div>
                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('register') }}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label
                                    for="first-name"
                                    class="col-md-4 col-form-label text-md-right">
                                    {{'First Name'}}
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="first-name"
                                        type="text"
                                        class="form-control @error('first-name') is-invalid @enderror"
                                        name="first_name"
                                        value="{{ old('first_name') }}"
                                        required autocomplete="first-name"
                                        autofocus>

                                    @error('first-name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="last-name"
                                    class="col-md-4 col-form-label text-md-right">
                                    {{ 'Last Name' }}
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="last-name"
                                        type="text"
                                        class="form-control @error('last-name') is-invalid @enderror"
                                        name="last_name"
                                        value="{{ old('last_name') }}"
                                        required autocomplete="last_name"
                                        autofocus>

                                    @error('last-name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="age"
                                    class="col-md-4 col-form-label text-md-right">
                                    {{ 'Age' }}
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="age"
                                        type="text"
                                        class="form-control @error('age') is-invalid @enderror"
                                        name="age"
                                        value="{{ old('age') }}"
                                        required autocomplete="age"
                                        autofocus>

                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <legend class="col-form-label col-4 pt-0 text-right"
                                >{{ 'Gender' }}</legend>

                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="gender"
                                               id="male"
                                               value="Male"
                                        >
                                        <label
                                            class="form-check-label"
                                            for="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="gender"
                                               id="female"
                                               value="Female">
                                        <label
                                            class="form-check-label"
                                            for="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="location"
                                    class="col-md-4 col-form-label text-md-right">
                                    {{ 'Location' }}
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="location"
                                        type="text"
                                        class="form-control @error('location') is-invalid @enderror"
                                        name="location"
                                        value="{{ old('location') }}"
                                        required autocomplete="location"
                                        autofocus>

                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="col-md-4 col-form-label text-md-right">
                                    {{ 'E-Mail Address' }}
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="password"
                                    class="col-md-4 col-form-label text-md-right">
                                    {{ 'Password' }}
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">
                                    {{ 'Confirm Password' }}
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="password-confirm"
                                        type="password"
                                        class="form-control"
                                        name="password_confirmation"
                                        required autocomplete="new-password">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label
                                    for="profile-picture"
                                    class="col-form-label col-4 pt-0 text-right">
                                    {{ 'Profile Photo' }}
                                </label>

                                <div class="form-group col-md-6">
                                    <input
                                        type="file"
                                        class="form-control-file"
                                        id="profile-picture"
                                        name="profile_picture">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">

                                    <button
                                        type="submit"
                                        class="btn btn-success">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection












