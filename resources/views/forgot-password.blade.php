@extends('layouts.app')

@section('title', 'Réinitialisation du mot de passe')
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
                        <h3 class="h3">Réinitialisation du mot de passe</h3>
                        <form action="{{ route('password.email') }}" method="POST" class="mb-5">
                            @csrf
                            <input type="email" placeholder="{{ __('Email') }}" name="email" id="email"
                                minlength="2" class="input-radius" required>
                            <button type="submit" class="btn btn-blue mt-3">{{ __('Email Password Reset Link') }}</button>
                        </form>
                        <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </p>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
