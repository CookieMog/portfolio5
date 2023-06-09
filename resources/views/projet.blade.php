@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')


    <div class="containers">
        <div class="mobilemenubar">
            @include('components.dropdown_menu')
        </div>
        <div class="column1">
            @include('components.nav_menu')

        </div>

        <div class="column2">
            <div class="diaporama">
                <div class="conteneur">

                    <section id="carousel" class="carousel" data-interval="500">
                        <div class="elements">
                            @foreach ($images as $image)
                                <div class="element">
                                    <img src="{{ asset("/storage/images/$image") }}" alt="{{ $singleProject->name }}">
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <button class="btngauche">
                        <i id="gauche" class="fa-solid fa-circle-chevron-left fa-4x"></i></button>
                    <button class="btndroite">
                        <i id="droite" class="fa-solid fa-circle-chevron-right fa-4x"></i></button>
                    <button class="play">
                        <i id="start" class="fa-regular fa-circle-play fa-3x"></i></button>
                    <button class="pause">
                        <i id="stop" class="fa-regular fa-circle-pause fa-3x"></i></button>

                </div>

            </div>


            <div id="ProjectDescription">
                Nom du Projet : {{ $singleProject->name }}
                <br>
                <br>
                Lien: <a href="{{ $singleProject->url }}">{{ $singleProject->url }}</a>
                <br>
                <br>
                <div class="Mission">
                    Mission :
                    @foreach ($singleProject->category as $category)
                        <span class="tag">{{ $category->name }}</span>
                    @endforeach
                    <br>
                    <br>
                </div>
                Description du projet : {{ $singleProject->description }}
                <br>
                <br>
                <div class="technologies">
                    Technologies :
                    @foreach ($singleProject->tags as $tag)
                        <span class="tag">{{ $tag->name }}</span>
                    @endforeach
                </div>
                <br>
                <br>
            </div>
            <a href=" {{ route('comment', ['id' => $singleProject->id]) }}" class="addComment">Ajouter un Commentaire
            </a>

            <div id="commentbox">
                @foreach ($comments as $comment)
                    <div class="commentaire">
                        Email: {{ $comment->email }}
                        <br>
                        Commentaire: {{ $comment->commentaire }}
                    </div>
                @endforeach
            </div>


        </div>
    </div>
@endsection
