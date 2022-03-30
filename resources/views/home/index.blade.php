@extends('layouts.main')
@section('content')
    <div class="main-content" style="min-height: 692px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ $heading }}</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $heading }}</h2>
                <div class="row">
@forelse($photos as $photo)
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image">
                                    <a href="{{ route('photo.show', [$photo->slug]) }}">
                                        <img width="350" height="233" src="{{ $photo->thumbnail_url }}" alt="{{ $photo->title }}">
                                    </a>
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-category"><div class="bullet"></div><a href="#"> Posté le {{ $photo->created_at->isoFormat('LL') }}</a></div>
                                <div class="article-title">
                                    <h2><a href="{{ route('photo.show', [$photo->slug]) }}">{{ $photo->title }}</a></h2>
                                </div>
                                <div class="article-user">
                                    <img alt="{{ $photo->album->user->name }}" src="{{ asset('assets/img/avatar/avatar-1.png') }}">
                                    <div class="article-user-details">
                                        <div class="user-detail-name">
                                            <a href="#">{{ $photo->album->user->name }}</a>
                                        </div>
                                        <div class="text-job"><a href="#">{{  $photo->album->title  }}</a> {{ $photo->album->photos->count() }} {{ Str::plural('photo', $photo->album->photos->count()) }}</div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
 @empty
                    <p>Il n'y a pas encore de photo à afficher.</p>
 @endforelse
                </div>
            </div>
        </section>
        <nav>
            {!! $photos->links() !!}
        </nav>
    </div>
@stop
