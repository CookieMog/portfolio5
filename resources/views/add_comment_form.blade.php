@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')

    <div class="containers">
        <div class="mobilemenubar">
            @include('components.dropdown_menu')
        </div>
        <div class="column1">
            @include('components.admin_menu')

        </div>


        <div class="column2">

            @include('components.messages')
            <form action="{{ route('storeComment') }}" class="commentForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $project->id }}">

                <label for="title"><strong>Email:</strong></label>
                <input type="mail" placeholder="" name="Mail" id="e-mail" required>

                <label for="subject"><strong>Votre Commentaire:</strong></label>
                <textarea name="comment" id="commentText" rows=5 cols=5></textarea>
                <button type="submit">Commenter

                </button>

            </form>
        @endsection
