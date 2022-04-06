<div class="float-right">
    <div class="dropdown d-inline mr-2">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Trier par
        </button>
        <div class="dropdown-menu" x-placement="bottom-start">
            <a class="dropdown-item" href="{{ url()->current() }}?sort=newest">Nouveautés</a>
            <a class="dropdown-item" href="{{ url()->current() }}?sort=oldest">Anciens</a>
            <a class="dropdown-item" href="{{ url()->current() }}?sort=download">Téléchargés</a>
            <a class="dropdown-item" href="{{ url()->current() }}?sort=popular">Populaires</a>
        </div>
    </div>
</div>
