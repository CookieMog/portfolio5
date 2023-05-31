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
            <div class="sectionHeader"> Aperçu de la page d'Accueil</div>
            <div class="Introduction">
                <div class="Photo">

                    @if (isset($image) && !empty($image))
                        <img src="{{ asset('storage/images/' . $image->image) }} " alt="Portrait">
                    @endif



                    <form method="POST" action="{{ route('dashboard-image') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="form-control" name="image" />

                        <button type="submit" class="btn btn-sm">Upload</button>
                    </form>
                </div>
                <h1>
                    Bienvenue sur mon Portfolio
                </h1>
                <div class="Texte">
                    <p>
                        Bienvenue sur mon portfolio. Mon nom est Alexis, jeune développeur web !
                        <br>
                        <br>
                        Je suis ravi de vous accueillir ici et de vous présenter mes compétences en développement web. Ayant
                        récemment terminé ma formation d'étudiant, je suis passionné par la création de sites web modernes
                        et fonctionnels.
                        <br>
                        <br>
                        Ce site se veut un reflet de mon parcours et de mes réalisations jusqu'à présent. J'ai acquis une
                        solide expérience dans les langages de programmation tels que HTML, CSS et JavaScript, ainsi que
                        dans l'utilisation de Laravel.
                        <br>
                        <br>
                        En explorant mon portfolio, vous découvrirez divers projets sur lesquels j'ai travaillé, mettant en
                        évidence ma créativité, ma capacité à résoudre des problèmes et ma volonté d'apprendre
                        continuellement. Je suis constamment à la recherche de nouvelles opportunités pour mettre mes
                        compétences à profit et relever des défis passionnants.
                        N'hésitez pas à parcourir mon travail et à me contacter si vous avez des questions, des propositions
                        de collaboration ou si vous souhaitez simplement discuter de vos idées de projets. Je suis ouvert à
                        de nouvelles opportunités et prêt à contribuer à votre succès en ligne.
                        <br>
                        <br>
                        Merci de votre visite et j'espère avoir bientôt de vos nouvelles !
                    </p>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
