@extends('layouts.app')

@section('title', 'Connexion')
@section('id', 'contact')

@section('metaHead')
    <meta property="og:url" content="{{ route('login') }}" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
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
                        <h3 class="h3">Connexion</h3>
                        <form action="{{ route('login') }}" method="POST" class="mb-5">
                            @csrf
                            <input type="email" placeholder="{{ __('Email') }}" name="email" id="email"
                                minlength="2" class="input-radius" required>
                            <input type="password" placeholder="{{ __('Password') }}" name="password" id="password"
                                class="input-radius" required>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                <label class="form-check-label" for="remember_me">
                                    {{ __('Remember me') }}
                                </label>
                            </div>
                            <button type="submit" class="btn btn-blue mt-3">Connexion</button>
                        </form>
                        <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                        <div class="mt-5">
                            <a href="{{ route('register') }}" class="btn btn-green">S'inscrire sur la plateform</a>
                        </div>

                    </div>


                </div>
            </div>
        </section>
    </main>
@endsection
