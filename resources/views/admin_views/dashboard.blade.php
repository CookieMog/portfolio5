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
            <div class="sectionHeader"> Aperçu de la page d'Accueil</div>
            <div class="Introduction">
                <div class="Photo">
                    <img src="{{ asset('images/' . Session::get('image')) }}" alt="AlexisPortrait">

                    <form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
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
                        Lorem ipsum dolor sit amet. Ut praesentium tenetur et voluptas
                        velit eos exercitationem voluptates et eaque quaerat a enim culpa?
                        Sit veniam nihil sit beatae architecto et dolore voluptas quo
                        excepturi dolorem eum internos facere nam omnis architecto sit
                        aliquam sapiente. Ut omnis obcaecati id provident quas sed quia
                        expedita vel cumque exercitationem.
                        <br />
                        <br />
                        Lorem ipsum dolor sit amet. Ut praesentium tenetur et voluptas
                        velit eos exercitationem voluptates et eaque quaerat a enim culpa?
                        Sit veniam nihil sit beatae architecto et dolore voluptas quo
                        excepturi dolorem eum internos facere nam omnis architecto sit
                        aliquam sapiente. Ut omnis obcaecati id provident quas sed quia
                        expedita vel cumque exercitationem.
                        <br />
                        <br />
                        Lorem ipsum dolor sit amet. Ut praesentium tenetur et voluptas
                        velit eos exercitationem voluptates et eaque quaerat a enim culpa?
                        Sit veniam nihil sit beatae architecto et dolore voluptas quo
                        excepturi dolorem eum internos facere nam omnis architecto sit
                        aliquam sapiente. Ut omnis obcaecati id provident quas sed quia
                        expedita vel cumque exercitationem.
                        <br />
                        <br />
                        Lorem ipsum dolor sit amet. Ut praesentium tenetur et voluptas
                        velit eos exercitationem voluptates et eaque quaerat a enim culpa?
                        Sit veniam nihil sit beatae architecto et dolore voluptas quo
                        excepturi dolorem eum internos facere nam omnis architecto sit
                        aliquam sapiente. Ut omnis obcaecati id provident quas sed quia
                        expedita vel cumque exercitationem. Lorem ipsum dolor sit amet. Ut praesentium tenetur et voluptas
                        velit eos exercitationem voluptates et eaque quaerat a enim culpa?
                        Sit veniam nihil sit beatae architecto et dolore voluptas quo
                        excepturi dolorem eum internos facere nam omnis architecto sit
                        aliquam sapiente. Ut omnis obcaecati id provident quas sed quia
                        expedita vel cumque exercitationem.
                        <br />
                        <br />
                        Lorem ipsum dolor sit amet. Ut praesentium tenetur et voluptas
                        velit eos exercitationem voluptates et eaque quaerat a enim culpa?
                        Sit veniam nihil sit beatae architecto et dolore voluptas quo
                        excepturi dolorem eum internos facere nam omnis architecto sit
                        aliquam sapiente. Ut omnis obcaecati id provident quas sed quia
                        expedita vel cumque exercitationem.
                    </p>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
