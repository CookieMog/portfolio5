<div class="nav_menu">
    <ul class="nav_list">


        <li class="nav_item dropdown">
            <a href="#" class="menu_link dropdown_link"><i class="fa-solid fa-bars fa-2x"></i></a>


            <ul class="dropdown_menu">
                <li class="dropdown_element"><a href="{{ route('admin') }}" class="menu_link">Accueil</a></li>
                <li class="dropdown_element"><a href="{{ route('gallery') }}" class="menu_link">Editer la Galerie</a>
                </li>
                <li class="dropdown_element"><a href="{{ route('moderate') }}" class="menu_link">Moderation</a></li>
                <li class="dropdown_element">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit" value="Déconnexion" class="menu_link">
                    </form>


                </li>
            </ul>
    </ul>


</div>
