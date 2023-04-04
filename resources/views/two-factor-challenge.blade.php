@extends('layouts.app')

@section('title', 'Véirifer votre email')
@section('id', 'contact')

@section('metaHead')
    <meta property="og:url" content="{{ route('login') }}" />
    <meta property="og:description"
        content="Que vous soyez exposants ou visiteurs, pour toute question sur Votre marché de Noël Virtuel et sur son fonctionnement, contactez nous !" />
    <meta property="og:image" content="{{ asset('images/home/home-logo.svg') }}" />
@endsection

@section('content')
    <main>

        <section class="container">
            <div class="form_content_auth">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12" x-data="{ recovery: false }">
                        <h3 class="h3">Authentification à deux facteurs</h3>
                        <form method="POST" action="{{ route('two-factor.login') }}">
                            @csrf
                            <div class="mt-4" x-show="! recovery">
                                <input class="input-radius" type="text" placeholder="{{ __('Code') }}"
                                    inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code"
                                    id="code">
                            </div>
                            <p class="text-center">OU</p>
                            <div class="mt-4" x-show="recovery">
                                <input class="input-radius" type="text" name="recovery_code" id="recovery_code"
                                    x-ref="recovery_code" autocomplete="one-time-code"
                                    placeholder="{{ __('Recovery Code') }}">
                            </div>
                            <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                            </div>

                            <div class="mb-4 text-sm text-gray-600" x-show="recovery">
                                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                            </div>
                            <button type="submit" class="btn btn-blue mt-3">{{ __('Log in') }}</button>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
