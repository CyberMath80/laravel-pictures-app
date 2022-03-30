@extends('layouts.main')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header d-block">
                <h1>
                    {{ $heading }}
                </h1>
                <div class="article-category"><div class="bullet"></div> Catégories :
                    @foreach($categories as $category)
                        <a href="">{{ ucfirst($category->name) }}</a>
                    @endforeach
                </div>
                <div class="article-category"><div class="bullet"></div> Tags :
                    @foreach($tags as $tag)
                        <a href="">{{ ucFirst($tag->name) }}</a>
                    @endforeach
                </div>
                <div class="article-category"><div class="bullet"></div>Résolution max {{ $photo->sources->max('width') }} X {{ $photo->sources->max('height') }}</div>
            </div>

            <div class="section-body">
                <h2 class="section-title">
                    {{ $heading }} - Photo postée par <a href="">{{ ucfirst($photo->album->user->name) }}</a> le {{ $photo->album->updated_at->isoFormat('LL') }}
                </h2>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Autres résolutions</h4>

                               {{-- <span class="text-right">
                      <a class="vote" href="{{ route('photo.vote', ['photo' => $photo->slug, 'vote' =>'like', 'token' => Session::token()]) }}">
                        <i class="far fa-thumbs-up"></i> {{ $photo->count_likes }}
                      </a>
                    </span>
                                &nbsp; &nbsp;
                                <span class="text-right">
                      <a class="vote" href="{{ route('photo.vote', ['photo' => $photo->slug, 'vote' =>'dislike', 'token' => Session::token()]) }}">
                        <i class="far fa-thumbs-down"></i> {{ $photo->count_dislikes }}
                      </a>
                    </span>--}}

                            </div>
                            <div class="card-body">

                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <div>
                                    <form action="" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group">
                                                <select class="custom-select" name="source">
                                                    {{-- <option value=""></option> --}}
                                                    {{--@foreach($photo->sources as $source)
                                                        <option value="{{ $source->id }}" @if(old('source') == $source->id) selected @endif>{{ $source->dimensions }} - {{ $source->convertToMo($source->size) }}</option>
                                                    @endforeach--}}
                                                </select>
                                                @error('source')
                                                <div class="error">{{ $message }}</div>
                                                @enderror
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">Télécharger</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">

                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{ $photo->sources->first()->url }}" alt="{{ $photo->title }}">
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>

@stop
