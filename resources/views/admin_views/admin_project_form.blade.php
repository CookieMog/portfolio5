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


        <div class="admin_column2">

            @include('components.messages')
            <form action="
                {{ route('storeProject') }}" class="projectForm" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name">Projet:</label>
                    <input type="text" name="name" required value="{{ old('name') ?? '' }}">
                </div>
                <div>
                    <label for="image_1">Image 1:</label>
                    <input type="file" name="image_1" accept="image/*" required value="{{ old('image_1') ?? '' }}">
                </div>
                <div>
                    <label for="image_2">Image 2:</label>
                    <input type="file" name="image_2" accept="image/*"value="{{ old('image_2') ?? '' }}">
                </div>
                <div>
                    <label for="image_3">Image 3:</label>
                    <input type="file" name="image_3" accept="image/*"value="{{ old('image_3') ?? '' }}">
                </div>
                <div>
                    <label for="description">Description:</label>
                    <textarea name="description" required value="{{ old('description') ?? '' }}"></textarea>
                </div>
                <div>
                    <label for="url">URL:</label>
                    <input type="text" name="url" required value="{{ old('url') ?? '' }}">
                </div>
                <div>
                    <label for="customer">Client:</label>
                    <input type="text" name="customer" required value="{{ old('customer') ?? '' }}">
                </div>
                <div>
                    <label for="technologies">Technologies:</label> {{-- Ce seront les tags --}}
                    <input type="text" name="technologies" required value="{{ old('technologies') ?? '' }}">
                </div>
                <div>
                    <label for="mission">Mission Réalisée:</label>
                    <input type="text" name="mission" required value="{{ old('mission') ?? '' }}">
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div>
                    <button type="submit">Mettre en Ligne

                    </button>
                </div>
            </form>
        @endsection
