@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card" style="width: 600px">
                    <div class="card-header">Profile picture</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form
                            method="post"
                            action="{{ route('picture.update') }}"
                            enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                             <div class="form-group">
                                <img src="{{ $user->getPicture() }}" class="img-thumbnail" width="100%">
                            </div>

                            <div class="form-group">
                                <input
                                    type="file"
                                    class="form-control-file"
                                    name="picture">
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

