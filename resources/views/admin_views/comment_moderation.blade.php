@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')

    <div class="containers">
        <div class="mobilemenubar">
            @include('components.admin_dropdown_menu')
        </div>
        <div class="column1">
            @include('components.admin_menu')

        </div>


        <div class="column2">
            <div class="ModerationsectionHeader">
                <ul>
                    <li><a href="">Commentaires</a>
                        <div class="ping"></div>
                    </li>
                    <li><a href="{{ route('moderate') }}">Statistiques</a></li>
                    <li><a href="">Profil</a></li>
                </ul>
            </div>
            <div class="ModerateCommentList">
                <h1>Commentaires en attente de validation</h1>

                @foreach ($comment as $comment)
                    <div class="commentBox">

                        <div class="Mail">
                            <h2>Email :</h2> {{ $comment->email }}
                        </div>
                        <div class="comment">
                            <H3>Commentaire:</H3> {{ $comment->commentaire }}
                        </div>
                        <div class="commentButtons">
                            <a href="{{ route('validate', ['id' => $comment->id]) }}">Valider</a>
                            <a href="{{ route('delete-comment', ['id' => $comment->id]) }}">Supprimer</a>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>

    </div>
    </div>
    </div>
@endsection
