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

            @foreach ($projets as $project)
                <div class="project_preview">
                    <a href="{{ route('project', ['id' => $project->id]) }}">
                        <img src="{{ asset("/storage/images/$project->image_1") }}" alt="{{ $project->name }}">
                    </a>
                    <div class="desc">
                        Nom du projet: {{ $project->name }}
                        <br />
                        Client : {{ $project->customer }}
                        <br />
                        Description: {{ $project->description }}
                        <br />
                        Mission : {{ $project->mission }}
                        <br />
                        Lien : <a href="{{ $project->url }}">{{ $project->url }}</a>
                        <br />
                        Technologies : {{ $project->technologies }}
                        <br />
                        <div class="buttons">
                            <form action=" {{ route('edit-project', $project->id) }}" method="GET">
                                @csrf

                                <button type="submit">Modifier</button>
                            </form>
                            <form action="{{ route('delete-project', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                        </div>
                    </div>

                </div>
            @endforeach
            <a href="{{ route('add-project') }}">Ajouter un nouveau Projet</a>
        </div>

    </div>
@endsection
