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
            <form action="
            {{ route('update-project', $project->id) }} " class="projectForm" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="name">Projet:</label>
                    <input type="text" name="name" required value="{{ $project->name ?? '' }}">
                </div>
                <div>
                    @if (isset($project->image_1))
                        <img width="100px" src="{{ asset("/storage/images/$project->image_1") }}" alt="">
                    @endif
                    <label for="image_1">Image 1:</label>
                    <input type="file" name="image_1" accept="image/*">
                </div>
                <div>
                    @if (isset($project->image_2))
                        <img width="100px" src="{{ asset("/storage/images/$project->image_2") }}" alt="">
                    @endif
                    <label for="image_2">Image 2:</label>
                    <input type="file" name="image_2" accept="image/*">
                </div>
                <div>
                    @if (isset($project->image_3))
                        <img width="100px" src="{{ asset("/storage/images/$project->image_3") }}" alt="">
                    @endif
                    <label for="image_3">Image 3:</label>
                    <input type="file" name="image_3" accept="image/*">
                </div>
                <div>
                    <label for="description">Description:</label>
                    <textarea name="description" required>{{ $project->description }}</textarea>
                </div>
                <div>
                    <label for="url">URL:</label>
                    <input type="text" name="url" required value="{{ $project->url ?? '' }}">
                </div>
                <div>
                    <label for="customer">Client:</label>
                    <input type="text" name="customer" required value="{{ $project->customer ?? '' }}">
                </div>
                <div>
                    <label for="tags[]">Tags:</label>
                    <select name="tags[]" class="form-control" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="mission">Mission Réalisée:</label>
                    <select name="mission" class="form-control" multiple>
                        @foreach ($categorie as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                </div>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div>
                    <button type="submit" class="Edit">Editer le projet

                    </button>
                </div>
            </form>
            <script>
                let editButton = document.querySelectorAll('.Edit');

                for (let i = 0; i < deleteButton.length; i++) {
                    deleteButton[i].addEventListener('click', (e) => {
                        if (confirm("Souhaitez-vous réellement modifier ce projet ?")) {
                            window.location.href = e.target.firstElementChild.getAttribute('href');
                        } else {
                            e.preventDefault();
                        }
                    });

                }
            </script>
        @endsection
