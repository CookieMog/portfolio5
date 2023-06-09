@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')

    <div class="admincontainers">
        <div class="mobilemenubar">
            @include('components.dropdown_menu')
        </div>
        <div class="column1">
            @include('components.nav_menu')
        </div>

        <div class="admin_column2">
            @include('components.messages')
            <div class="searchArea">
                @include('components.searchbar')
            </div>
            <div id="projectList">
                @foreach ($projets as $project)
                    <div class="project_preview">
                        <a href="{{ route('project', ['id' => $project->id]) }}">
                            <img src="{{ asset("/storage/images/$project->image_1") }}" alt="{{ $project->name }}">
                        </a>
                        <div class="desc">
                            Nom du projet: {{ $project->name }}
                            <br>
                            Client : {{ $project->customer }}
                            <br>
                            <div class="TextDescription">
                                Description: {{ Str::limit($project->description, 200) }}
                            </div>
                            <br>
                            <div class="Mission">
                                Mission :
                                @foreach ($project->category as $category)
                                    <span class="tag">{{ $category->name }}</span>
                                @endforeach
                            </div>
                            <br>
                            Lien : <a href="{{ $project->url }}">{{ $project->url }}</a>
                            <br>
                            <br>
                            <div class="technologies">
                                Technologies :
                                @foreach ($project->tags as $tag)
                                    <span class="tag">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                            <br>
                            <div class="buttons">
                                <a href="{{ route('project', ['id' => $project->id]) }}">Voir Plus</a>

                            </div>


                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <script>
            let searchForm = document.getElementById('searchForm');
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();

                let searchBar = document.getElementById('searchBar');
                let searchKey = searchBar.value;
                let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let csrfTokenElement = document.querySelector('meta[name="csrf-token"]');

                let searchRequest = new XMLHttpRequest();
                searchRequest.onreadystatechange = function() {
                    if (searchRequest.readyState === XMLHttpRequest.DONE) {
                        if (searchRequest.status === 200) {
                            let projectList = document.getElementById('projectList');
                            if (searchKey !== "") {
                                projectList.innerHTML = searchRequest.responseText;
                            }
                        } else {
                            projectList.innerHTML = '';
                        }
                    } else {
                        console.error(searchRequest.status);
                    }

                }
                searchRequest.open('POST', '/recherche');
                searchRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                searchRequest.setRequestHeader('X-CSRF-Token', csrfTokenElement.getAttribute('content'));
                searchRequest.send('_token=' + csrfToken + '&searchBar=' + searchKey);
            })
        </script>

    </div>




@endsection
