@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card" style="width: 600px">
                    <div class="card-header">My preferences</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form
                            method="post"
                            action="{{ route('preferences.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="form-group">
                                <div class="pt-0">
                                    Genders to be shown
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"
                                           type="radio"
                                           id="male"
                                           name="partner_gender"
                                           value="male">
                                    <label class="form-check-label"
                                           for="male">
                                        Male
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"
                                           type="radio"
                                           id="female"
                                           name="partner_gender"
                                           value="female">
                                    <label class="form-check-label"
                                           for="female">
                                        Female
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"
                                           type="radio"
                                           id="both"
                                           name="partner_gender"
                                           value="both">
                                    <label class="form-check-label"
                                           for="both">
                                        Both
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <label for="min-age"> Min Age: <span id="min"></span> </label>
                                </div>

                                <span>16</span>
                                <input
                                    style="width:89%"
                                    type="range"
                                    id="min-age"
                                    class="custom-range"
                                    name="min_age"
                                    value="{{  old('min_age', $user->min_age) }}"
                                    min="16"
                                    max="70"
                                    step="1"/>
                                <span>70</span>
                            </div>

                            <script>
                                var sliderMin = document.getElementById("min-age");
                                var outputMin = document.getElementById("min");
                                outputMin.innerHTML = sliderMin.value;

                                sliderMin.oninput = function() {
                                    outputMin.innerHTML = this.value;
                                }
                            </script>


                            <div class="form-group">
                                <div>
                                    <label for="max_age"> Max Age: <span id="max"></span>  </label>
                                </div>
                                <span>16</span>
                                <input
                                    style="width:89%"
                                    type="range"
                                    id="max-age"
                                    class="custom-range"
                                    name="max_age"
                                    value="{{  old('max_age', $user->max_age) }}"
                                    min="16"
                                    max="70"
                                    step="1"/>
                                <span>70</span>
                            </div>

                            <script>
                                var sliderMax = document.getElementById("max-age");
                                var outputMax = document.getElementById("max");
                                outputMax.innerHTML = sliderMax.value;

                                sliderMax.oninput = function() {
                                    outputMax.innerHTML = this.value;
                                }
                            </script>

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

                    </div>
                </div>

        </div>
    </div>
@endsection

