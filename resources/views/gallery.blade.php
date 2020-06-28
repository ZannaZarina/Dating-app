@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center ">
            <div
                class="card"
                style="width: 800px">
                <div class="card-header">
                    @if( $user == auth()->user() )
                        My Gallery
                    @else
                        Gallery of {{ $user -> first_name }}
                    @endif
                </div>
                <div class="card-body">

                    <div class="user-info d-flex">
                        @if( $user != auth()->user() )
                            <div>
                                <a class="d-block mb-4 h-100" data-toggle="modal" data-target="#modal">
                                    <img src="{{ $user->getPicture() }}"
                                         class="card-fluid img-thumbnail"
                                         alt="photo of {{ $user->first_name }}"
                                         style="width: 100px">
                                </a>
                                <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $user->first_name }}'s
                                                    photo</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img class="img-fluid img-thumbnail" src="{{ $user->getPicture() }}"
                                                     alt="{{ $user->first_name }}" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h4> {{ $user->first_name . ' ' . $user->last_name . ', ' . $user->age  }}</h4>
                                <ul>
                                    <li class="card-text"> {{ $user->gender }}, living
                                        in {{ $user->location }} </li>
                                    <li class="card-text"> looking for
                                        @if ($user->partner_gender == 'both')
                                            {{ $user->partner_gender }}, male and female
                                        @else
                                            {{ $user->partner_gender }}
                                        @endif
                                    </li>
                                    <li class="card-text">
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
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <hr>

                    @if( $user == auth()->user() )
                        I have
                    @else
                        {{ $user -> first_name }} has
                    @endif

                    @if(count($pictures) ==1)
                        only 1 photo
                    @else
                        {{ count($pictures) }} photos
                    @endif
                    to show

                    <hr class="mt-2 mb-3">

                    <div class="row text-center text-lg-left">
                        @foreach($pictures as $key=>$picture)
                            <div class="col-lg-4 col-md-4 col-6">
                                <a class="d-block mb-4 h-100" data-toggle="modal" data-target="#modal{{$key}}">
                                    <img class="img-fluid img-thumbnail" src="{{ $picture->getUrl() }}"
                                         alt="{{ $user->first_name }}">
                                </a>

                                <div class="modal fade" id="modal{{$key}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $user->first_name }}'s
                                                    photo</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img class="img-fluid img-thumbnail" src="{{ $picture->getUrl() }}"
                                                     alt="{{ $user->first_name }}" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if( $user == auth()->user() )
                        <form
                            method="post"
                            action="{{ route('gallery.update', $user) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <input
                                    type="file"
                                    class="form-control-file"
                                    name="picture[]"
                                    multiple>
                            </div>

                            <button
                                type="submit"
                                class="btn btn-light">
                                Submit
                            </button>

                            <a href="{{ route('profile') }}"
                               role="button"
                               class="btn-md active card-link btn btn-light">
                                My profile
                            </a>
                        </form>
                    @else
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
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection


