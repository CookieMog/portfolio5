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
            <div class="ModerationsectionHeader">
                <ul>
                    <li><a href="{{ route('moderateComment') }}">Commentaires</a>
                        <div class="ping" id="ping"></div>
                    </li>
                    <li><a href="{{ route('moderate') }}">Statistiques</a></li>
                    <li><a href="">Profil</a></li>
                </ul>
            </div>
            <div class="StatBody">
                <h1>Statistiques de Traffic de votre site</h1>
                <p>Voci les principales infos de traffic du site:</p>
                <ul>
                    <li>Nombre de visiteurs aujourd'hui: </li>
                    <li>Nombre de visiteurs cette semaine:</li>
                    <li>Nombre de visiteurs ce mois-ci: </li>
                </ul>
            </div>
        </div>



    </div>

    </div>
    </div>
    </div>
    <script>
        let CommentsToValidate = {{ count($comment) }};
        let ping = document.getElementById('ping');
        if (CommentsToValidate > 0) {
            ping.textContent = CommentsToValidate;
            ping.style.display = 'block';
        } else {

            ping.style.display = 'none';
        }
    </script>
@endsection
