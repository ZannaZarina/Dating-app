@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card" style="width: 1000px;">
                <div class="card-header">Like history</div>

                <div class="card-body">

                    @if(count($likesTo)!==0)
                        I liked {{ count($likesTo) }}
                        @if(count($likesTo)==1)
                            person
                        @else
                            persons
                        @endif

                        <div class="row text-center text-lg-left">
                            @foreach($likesTo as $user)
                                <div class="col-lg-3 col-md-4 col-6">
                                    <div class="card-body">
                                        @if($user->gender == 'male')
                                            <span style='font-size:25px; color:#8736ad'>&#9679;</span>
                                        @else
                                            <span style='font-size:25px; color:#ebb1d0'>&#9679;</span>
                                        @endif
                                        {{ $user->first_name }}, {{ $user->age }}

                                        <a href="{{ route('gallery', $user) }}">
                                            <img src="{{ $user->getPicture() }}" class="img-thumbnail"
                                                 style="width:100%">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                            @else
                                <p> You didn't like anyone yet...</p>
                            @endif

                        <hr class="mt-2 mb-3">

                        @if(count($likesFrom) != 0)
                            {{ count($likesFrom) }}
                            @if(count($likesFrom) == 1)
                                person
                            @else
                                persons
                            @endif
                            liked me

                            <div class="row text-center text-lg-left">
                                @foreach($likesFrom as $user)
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card-body">
                                            @if($user->gender == 'male')
                                                <span style='font-size:25px; color:#8736ad'>&#9679;</span>
                                            @else
                                                <span style='font-size:25px; color:#ebb1d0'>&#9679;</span>
                                            @endif
                                            {{ $user->first_name }}, {{ $user->age }}

                                            <a href="{{ route('gallery', $user) }}">
                                                <img src="{{ $user->getPicture() }}" style="width:100%"
                                                     class="img-thumbnail">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                                @else
                                    <p> No one liked You yet... </p>
                                @endif

                            <a href="{{ route('profile') }}"
                               role="button"
                               class="btn-md active card-link btn btn-light">
                                My profile
                            </a>

                            <a href="{{ route('filtered.users') }}"
                               role="button"
                               class="btn-md active card-link btn btn-light">
                                Find someone
                            </a>

                </div>
            </div>
        </div>
    </div>
@endsection
