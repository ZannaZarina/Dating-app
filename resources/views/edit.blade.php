@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

                <div class="card" style="width: 600px">
                    <div class="card-header">Edit profile</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                       <form
                            method="post"
                            action="{{ route('profile.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                           <div class="form-group">
                               <label for="first-name">First Name</label>
                               <input type="text"
                                      class="form-control"
                                      id="first-name"
                                      name="first_name"
                                      value="{{ old('first_name', $user->first_name) }}">
                           </div>

                           <div class="form-group">
                               <label for="last-name">Last Name</label>
                               <input type="text"
                                      class="form-control"
                                      id="last-name"
                                      name="last_name"
                                      value="{{ old('last_name', $user->last_name) }}">
                           </div>

                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text"
                                       class="form-control"
                                       id="age"
                                       name="age"
                                       value="{{ old('age', $user->age) }}">
                            </div>

                           <div class="form-group">
                               <label for="location">Location</label>
                               <input type="text"
                                      class="form-control"
                                      id="location"
                                      name="location"
                                      value="{{ old('location', $user->location) }}">
                           </div>

                            <button
                                type="submit"
                                class="btn btn-light">
                                Submit
                            </button>

                            <a href="{{ route('profile') }}"
                               role="button"
                               class="btn-md active card-link btn btn-light">
                                Go back
                            </a>

                        </form>

                    </div>
                </div>

        </div>
    </div>
@endsection

