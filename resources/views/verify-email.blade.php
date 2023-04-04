@extends('layouts.app')

@section('title', 'Vérifier votre email')
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
                        <h3 class="h3">Vous devez vérifier votre email</h3>
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif
                        <form action="{{ route('verification.send') }}" method="POST" class="mb-5">
                            @csrf
                            <button type="submit" class="btn btn-blue mt-3">{{ __('Resend Verification Email') }}</button>
                        </form>
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
