@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center ">

            <div class="card" style="width: 1000px">
                <div class="card-header">My profile</div>

                <div class="card-body" style="display: flex">

                    <div class="profile-picture" style="width: 140%">
                        <img src="{{ $user->getPicture() }}"
                             class="card-img img-thumbnail"
                             alt="photo of {{ $user->first_name }}"
                             >
                    </div>

                    <div class="card-content"
                         style="display:flex; flex-direction: column; justify-content: space-between">
                        <div class="card-form"
                             style="margin-left:20px">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <ul style="font-size: 1.2em; background: rgba(255,255,255,0.3);">
                                <h3 class="card-title"
                                    style="font-weight: bold">
                                    @if($user->gender == 'female')
                                        <span style='font-size:30px; color: #ebb1d0'>&#9679;</span>
                                    @else
                                        <span style='font-size:30px; color: #8736ad'>&#9679;</span>
                                    @endif
                                        {{ $user->first_name . ' ' . $user->last_name . ', ' . $user->age  }}</h3>
                                <li><p class="card-text"> {{ $user->gender }}, living in {{ $user->location }} </p></li>
                                <li>
                                    <p class="card-text"> looking for
                                        @if ($user->partner_gender == 'both')
                                            {{ $user->partner_gender }}, male and female
                                        @else
                                            {{ $user->partner_gender }}
                                        @endif
                                    </p>
                                </li>
                                <li>
                                    <p class="card-text">
                                        partner should be
                                        @if($user->min_age != $user->max_age)
                                            @if($user->min_age < $user->max_age)
                                                at least {{ $user->min_age }} , max  {{ $user->max_age }}
                                            @else
                                                at least {{ $user->max_age }} , max  {{ $user->min_age }}
                                            @endif
                                        @else
                                            {{ $user->min_age }}
                                        @endif
                                        years old
                                    </p>
                                </li>
                            </ul>
                        </div>

                        <div class="card-buttons" style="margin-left:20px">
                            <a href="{{ route('gallery', $user) }}"
                               role="button"
                               class="btn-md active card-link btn btn-light">
                                Gallery
                            </a>
                            <a href="{{ route('picture.edit') }}"
                               role="button"
                               class="btn-md active card-link btn btn-light">
                                Change photo
                            </a>
                            <a href="{{ route('preferences.edit') }}"
                               role="button"
                               class="btn-md active card-link btn btn-light">
                                Preferences
                            </a>

                        </div>
                    </div>

                </div>


            </div>
        </div>

@endsection


