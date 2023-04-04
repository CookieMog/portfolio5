@extends('layouts.app')

@section('title', 'Confirmation de mot de passe')
@section('id', 'contact')

@section('metaHead')
    <meta property="og:url" content="{{ route('register') }}" />
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
                        <h3 class="h3">Confirmer le mot de passe</h3>
                        <form action="{{ route('password.confirm') }}" method="POST" class="mb-5">
                            @csrf
                            <input type="password" placeholder="{{ __('Password') }}" name="password" id="password"
                                minlength="2" class="input-radius" autocomplete="current-password" autofocus required>
                            <button type="submit" class="btn btn-blue mt-3">{{ __('Confirm') }}</button>
                        </form>
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
