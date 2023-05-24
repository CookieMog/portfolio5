@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')

    <div class="admincontainers">
        <div class="mobilemenubar">
            @include('components.dropdown_menu')
        </div>
        <div class="column1">
            @include('components.admin_menu')
        </div>

        <div class="admin_column2">
            @include('components.messages')
            <h1 class="contactTitle">Contactez-Moi</h1>
            <form method="POST" action="{{ route('sendMail') }}" class="ContactForm">
                @csrf
                <div class="contactMail">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="subject">Sujet:</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" cols="50" required></textarea>
                </div>
                <div>
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </div>

    </div>








@endsection
