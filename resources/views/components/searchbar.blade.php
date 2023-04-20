<form id="searchForm" action="/recherche" method="POST" role="search">
    {{ csrf_field() }}
    <div class="searchbar">
        <input type="text" class="form-control" name="searchBar" id="searchBar" placeholder="cherchez un projet"> <span
            class="input-group-btn">
            <button type="submit" class="searchBtn" id="searchBtn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </span>
    </div>
</form>
