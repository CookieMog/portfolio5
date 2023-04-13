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
                        Description: {{ Str::limit($project->description, 200) }}
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
                        <div class="technologies">
                            Technologies :
                            @foreach ($project->tags as $tag)
                                <span class="tag">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                        <br />
                        <div class="buttons">
                            <a href="{{ route('project', ['id' => $project->id]) }}">Voir Plus</a>
                            </form>
                        </div>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>


    </div>

    </div>


@endsection
