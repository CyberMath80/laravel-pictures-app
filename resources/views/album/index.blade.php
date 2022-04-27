@extends('layouts.main')
@section('content')
                <div class="main-content">
                    <section class="section">
                        <div class="section-header">
                            <h1>{{ $heading }}</h1>
                        </div>
                        <div class="section-body">
                            <div class="div-title">
                                <h2 class="section-title">{{ $heading }}</h2>&nbsp;
                                <a class="btn btn-primary ml-2" href="{{ route('albums.create') }}">Ajouter un album</a>
                            </div>
                            <div class="row">
@forelse($albums as $album)
                                <div class="col-12 col-md-4 col-lg-4">
                                    <article class="article article-style-c">
                                        <div class="article-header">
                                            <div class="article-image">
                                                <a href="{{ route('albums.show', [$album->slug]) }}">
@if(count($album->photos) > 0)
                                                    <img width="350" height="233" src="{{ $album->photos[0]->thumbnail_url }}" alt="{{ $album->title }}">
@else
                                                    <span>{{ $album->title }} : cet album ne contient pas encore de photo.</span>
@endif
                                                </a>
                                            </div>
                                        </div>
                                        <div class="article-details">
                                            <div class="article-category"><div class="bullet"></div>Mis à jour le {{ $album->updated_at->isoFormat('LL') }}</div>
                                            <div class="article-title">
                                                <h2><a href="{{ route('albums.show', [$album->slug]) }}">{{ $album->title }}</a></h2>
                                            </div>
                                            <div class="article-user">
                                                <div class="article-user-details">
                                                    <div class="text-job"></div>
@if(Auth::user()->id == $album->user_id)
                                                    <div class="destroy text-right">
                                                        <a href="{{ route('photo.create', [$album->slug]) }}"><i class="fas fa-plus btn btn-info"></i></a>
                                                        <a href="{{ route('albums.edit', [$album->slug]) }}"><i class="fas fa-edit btn btn-warning"></i></a>
                                                        <form action="{{ route('albums.destroy', [$album->slug]) }}" method="post" class="destroy">
                                                            @csrf @php echo "\n"; @endphp
                                                            @method('DELETE') @php echo "\n"; @endphp
                                                            <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
@endif
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
@empty
                                <p>Il n'y a pas encore d'album à afficher.</p>
@endforelse
                            </div>
                        </div>
                    </section>
                    <div>
                        {!! $albums->links() !!}
                    </div>
                </div>
@stop
