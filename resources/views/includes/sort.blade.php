                        <div class="float-right">
                            <div class="dropdown d-inline mr-2">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Trier par</button>
                                <div class="dropdown-menu sort" x-placement="bottom-start">
@empty($search)
                                    <a class="dropdown-item" href="{{ url()->current() }}?sort=newest">Nouveautés</a>
@else
                                    <a class="dropdown-item" href="{{ url()->current() }}?search={{ $search }}&sort=newest">Nouveautés</a>
@endempty
@empty($search)
                                    <a class="dropdown-item" href="{{ url()->current() }}?sort=oldest">Anciens</a>
@else
                                    <a class="dropdown-item" href="{{ url()->current() }}?search={{ $search }}&sort=oldest">Anciens</a>
@endempty
@empty($search)
                                    <a class="dropdown-item" href="{{ url()->current() }}?sort=download">Téléchargés</a>
@else
                                    <a class="dropdown-item" href="{{ url()->current() }}?search={{ $search }}&sort=download">Téléchargés</a>
@endempty
@empty($search)
                                    <a class="dropdown-item" href="{{ url()->current() }}?sort=popular">Populaires</a>
@else
                                    <a class="dropdown-item" href="{{ url()->current() }}?search={{ $search }}&sort=popular">Populaires</a>
@endempty
                                </div>
                            </div>
                        </div>
