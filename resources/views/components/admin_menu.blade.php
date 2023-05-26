<div class="NavMenuHeader">
    <div id="AdminLogo"><a href="{{ route('gallery') }}"><img src="https://via.placeholder.com/200x100" alt="NavLogo"></a>
    </div>
</div>
<div class="NavMenu">
    <ul class="Options">
        <li class="menu_element"><a href="{{ route('admin') }}" class="menu_link">Accueil</a></li>
        <li class="menu_element"><a href="{{ route('gallery') }}" class="menu_link">Editer la Galerie</a></li>
        <li class="menu_element"><a href="{{ route('moderate') }}" class="menu_link">Modération</a></li>
        <li class="menu_element">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" value="Déconnexion" class="menu_link">
            </form>

        </li>

    </ul>
</div>
