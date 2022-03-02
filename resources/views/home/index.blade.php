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
                <h2 class="section-title">{{ $heading }}</h2>
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image" data-background="../assets/img/news/img13.jpg" style="background-image: url(&quot;../assets/img/news/img13.jpg&quot;);">
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-category"><a href="#">News</a> <div class="bullet"></div> <a href="#">5 Days</a></div>
                                <div class="article-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. </p>
                                <div class="article-user">
                                    <img alt="image" src="../assets/img/avatar/avatar-1.png">
                                    <div class="article-user-details">
                                        <div class="user-detail-name">
                                            <a href="#">Hasan Basri</a>
                                        </div>
                                        <div class="text-job">Web Developer</div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image" data-background="../assets/img/news/img14.jpg" style="background-image: url(&quot;../assets/img/news/img14.jpg&quot;);">
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-category"><a href="#">News</a> <div class="bullet"></div> <a href="#">5 Days</a></div>
                                <div class="article-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. </p>
                                <div class="article-user">
                                    <img alt="image" src="../assets/img/avatar/avatar-3.png">
                                    <div class="article-user-details">
                                        <div class="user-detail-name">
                                            <a href="#">Rizal Fakhri</a>
                                        </div>
                                        <div class="text-job">UX Designer</div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image" data-background="../assets/img/news/img01.jpg" style="background-image: url(&quot;../assets/img/news/img01.jpg&quot;);">
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-category"><a href="#">News</a> <div class="bullet"></div> <a href="#">5 Days</a></div>
                                <div class="article-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. </p>
                                <div class="article-user">
                                    <img alt="image" src="../assets/img/avatar/avatar-2.png">
                                    <div class="article-user-details">
                                        <div class="user-detail-name">
                                            <a href="#">Irwansyah Saputra</a>
                                        </div>
                                        <div class="text-job">Mobile Developer</div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
