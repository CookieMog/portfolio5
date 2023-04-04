@extends('layouts.app')

@section('title', 'Création de compte')
@section('id', 'contact')

@section('metaHead')
    <meta property="og:url" content="{{ route('register') }}" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="{{ asset('mv/mnv/images/home/home-logo.svg') }}" />
@endsection

@section('content')
    <main>
        <div class="mobilemenubar">
            @include('components.dropdown_menu')
        </div>
        <div class="column1">
            @include('components.nav_menu')

        </div>



        <section class="container">
            <div class="form_content_auth">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        <h3 class="h3">Création de compte</h3>
                        <form action="{{ route('register') }}" method="POST" class="mb-5">
                            @csrf
                            <input type="text" placeholder="{{ __('Name') }}" name="name" id="name"
                                minlength="2" class="input-radius" required>
                            <input type="email" placeholder="{{ __('Email') }}" name="email" id="email"
                                minlength="2" class="input-radius" required>
                            <input type="password" placeholder="{{ __('Password') }}" name="password" id="password"
                                minlength="2" class="input-radius" required>
                            <input type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation"
                                id="password_confirmation" minlength="2" class="input-radius" required>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=1 id="form_cgv_cgu"name="form_cgv_cgu"
                                    required>
                                {{--    <label class="form-check-label" for="form_cgv_cgu">J'accepte les <a
                                        href="{{ route('cgv') }}" target="_blank">CGV</a> et les <a
                                        href="{{ route('cgu') }}" target="_blank">CGU</a> pour
                                    créer mon compte</label> --}}
                            </div>
                            <button type="submit" class="btn btn-blue mt-3">{{ __('Register') }}</button>
                        </form>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>

                </div>
            </div>
        </section>


    </main>
@endsection
