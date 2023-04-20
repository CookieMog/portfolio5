@extends('layouts.search')

@section('title', 'Search Results')

@section('content')
    <div class="admin_column2">
        @include('components.messages')


        <h1>résultats pour: "{{ $searchTerm }}"</h1>

        @if ($projets->isEmpty())
            <p>No results found.</p>
        @else
            <div class="project_list">
                @foreach ($projets as $project)
                    <div class="project_preview">
                        <a href="{{ route('project', ['id' => $project->id]) }}">
                            <img src="{{ asset("storage/images/$project->image_1") }}" alt="{{ $project->name }}">
                        </a>
                        <div class="desc">
                            Nom du projet: {{ $project->name }}
                            <br />
                            Client : {{ $project->customer }}
                            <br />
                            <div class="TextDescription">
                                Description: {{ Str::limit($project->description, 200) }}
                            </div>
                            <br />
                            <div class="Mission">
                                Mission :
                                @foreach ($project->category as $category)
                                    <span class="tag">{{ $category->name }}</span>
                                @endforeach
                            </div>
                            <br />
                            Lien : <a href="{{ $project->url }}">{{ $project->url }}</a>
                            <br />
                            <br />
                            <div class="technologies">
                                Technologies :
                                @foreach ($project->tags as $tag)
                                    <span class="tag">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                @endforeach
            </div>
    </div>
    @endif
@endsection
