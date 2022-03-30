@extends('layouts.main')
@section('content')
    <div class="main-content" style="min-height: 692px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ $heading }}</h1>
                {{--<div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Article</div>
                </div>--}}
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
                                            <img width="350" height="233" src="{{ $album->photos[0]->thumbnail_url }}" alt="{{ $album->title }}">
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
                                                    <a href="{{ route('photo.create', [$album->slug]) }}" class="mr-2">
                                                        <i class="fas fa-plus btn btn-info"></i>
                                                    </a>
                                                    <a href="{{ route('albums.edit', [$album->slug]) }}">
                                                        <i class="fas fa-edit btn btn-warning"></i>
                                                    </a>
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
        <nav>
            {!! $albums->links() !!}
        </nav>
    </div>
@stop
