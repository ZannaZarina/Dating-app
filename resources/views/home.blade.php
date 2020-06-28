@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div
                    class="card"
                    style="max-width: 640px">
                    <div class="card-header">Find Someone</div>

                    <div class="card-body">
                        @if($user)
                            <div>
                                <div class="buttons-and-photo"
                                     style="display: flex; justify-content: space-around">
                                    <form
                                        method="post"
                                        action="{{ route('match.like', $user) }}"
                                        style="margin-top: auto; margin-bottom: auto">
                                        @csrf
                                        <button type="submit" class="btn btn-success" >&#128077</button>
                                    </form>
                                    <img src="{{ $user->getPicture() }}"
                                         class="card-img-top img-thumbnail"
                                         alt="photo of {{ $user->first_name }}"
                                         style="width: 80%">
                                    <form
                                        method="post"
                                        action="{{ route('match.dislike', $user) }}"
                                        style="margin-top: auto; margin-bottom: auto">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">&#128078</button>
                                    </form>
                                </div>

                                <div class="card-body">
                                    <ul style="font-size: 1.2em;  background: rgba(255,255,255,0.3)">
                                        <h4 class="card-title"
                                            style="font-weight: bold">
                                            @if($user->gender == 'female')
                                                <span style='font-size:30px; color: #ebb1d0'>&#9679;</span>
                                            @else
                                                <span style='font-size:30px; color: #8736ad'>&#9679;</span>
                                            @endif
                                            {{ $user->first_name . ' ' . $user->last_name . ', ' . $user->age  }}</h4>
                                        <li><p class="card-text"> {{ $user->gender }}, living
                                                in {{ $user->location }} </p></li>
                                        <li><p class="card-text"> looking for
                                                @if ($user->partner_gender == 'both')
                                                    {{ $user->partner_gender }}, male and female
                                                @else
                                                    {{ $user->partner_gender }}
                                                @endif
                                            </p></li>
                                        <li><p class="card-text">
                                                partner should be
                                                @if($user->min_age != $user->max_age)
                                                    @if($user->min_age < $user->max_age)
                                                        at least {{ $user->min_age }} ,
                                                        max  {{ $user->max_age }}
                                                    @else
                                                        at least {{ $user->max_age }} ,
                                                        max  {{ $user->min_age }}
                                                    @endif
                                                @else
                                                    {{ $user->min_age }}
                                                @endif
                                                years old
                                            </p></li>
                                    </ul>
                                </div>

                            </div>

                        @else
                            <p> No users to show... </p>
                        @endif

                        @if($user)
                            <a href="{{ route('gallery', $user) }}"
                               role="button"
                               class="btn-md active card-link btn btn-light">
                                More photos
                            </a>
                        @endif
                        <a href="{{ route('profile') }}"
                           role="button"
                           class="btn-md active card-link btn btn-light">
                            My profile
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
