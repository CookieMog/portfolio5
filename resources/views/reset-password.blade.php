@extends('layouts.app')

@section('title', 'Mise à jour du mot de passe')
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
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        <h3 class="h3">Mise à jour du mot de passe</h3>
                        <form action="{{ route('password.update') }}" method="POST" class="mb-5">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <input type="email" placeholder="{{ __('Email') }}" name="email" id="email"
                                minlength="2" class="input-radius" required>
                            <input type="password" placeholder="{{ __('Password') }}" name="password" id="password"
                                minlength="2" class="input-radius" required>
                            <input type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation"
                                id="password_confirmation" minlength="2" class="input-radius" required>
                            <button type="submit" class="btn btn-blue mt-3">{{ __('Reset Password') }}</button>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
