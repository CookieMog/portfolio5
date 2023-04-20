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
                <div class="TagSection">
                    <div>
                        <label for="tags[]">Nouveaux Tags:</label>
                        <select name="tags[]" class="form-control" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="tags[]">Tags Existants:</label>
                        <select name="existingTags[]" id="existingTags" multiple>
                            @foreach ($project->tags as $tag)
                                <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <button type="button" id="removeTag">Supprimer</button>
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

                for (let i = 0; i < editButton.length; i++) {
                    editButton[i].addEventListener('click', (e) => {
                        if (confirm("Souhaitez-vous réellement modifier ce projet ?")) {
                            window.location.href = e.target.firstElementChild.getAttribute('href');
                        } else {
                            e.preventDefault();
                        }
                    });

                }


                let removeTagButton = document.getElementById('removeTag');
                removeTagButton.addEventListener('click', function() {
                    console.log('delete button clicked!');

                    let selectedTags = document.getElementById('existingTags').selectedOptions;
                    let tagIds = [];
                    console.log(tagIds);
                    for (let i = 0; i < selectedTags.length; i++) {
                        tagIds.push(selectedTags[i].value);
                    }
                    let projectId = "{{ $project->id }}";
                    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    let csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
                    let deleteRequest = new XMLHttpRequest();
                    deleteRequest.open('DELETE', '{{ route('delete-tags', ['id' => $project]) }}', true);

                    deleteRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    deleteRequest.setRequestHeader('X-CSRF-Token', csrfTokenElement.getAttribute('content'));

                    /*  console.log('Delete button clicked');
                     console.log('New tag:', newTag);
                     console.log('Project ID:', projectId);
                     console.log('CSRF token:', csrfToken); */
                    deleteRequest.onreadystatechange = function() {
                        if (deleteRequest.readyState === XMLHttpRequest.DONE) {
                            if (deleteRequest.status === 200) {
                                tagIds.forEach(function(tagId) {
                                    let optionToRemove = document.querySelector('#existingTags option[value="' +
                                        tagId + '"]');
                                    optionToRemove.remove();
                                });
                            } else {
                                console.error(deleteRequest.status);
                            }
                        }
                    };
                    deleteRequest.send('tags=' + JSON.stringify(tagIds));
                });
            </script>
        @endsection
