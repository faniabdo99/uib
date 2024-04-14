@extends('layout.master')
@section('content')
    <!-- breadcrumb-area -->
    <div class="breadcrumb__area breadcrumb__bg" data-background="{{ $Project->imagePath }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__content">
                        <h2 class="title">Project Details</h2>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ route('home') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator">/</span>
                            <span property="itemListElement" typeof="ListItem">Project Details</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- project-details-area -->
    <section class="project__details-area section-py-120">
        <div class="container">
            <div class="project__details-top-content">
                <div class="row">
                    <div class="col-29">
                        <div class="project__details-info">
                            <h3 class="info-title">Project Information</h3>
                            <div class="project__info-item-wrap">
                                @if($Project->client)
                                    <div class="project__info-item">
                                        <div class="icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="content">
                                            <span>Clients:</span>
                                            <h4 class="title">{{ $Project->client }}</h4>
                                        </div>
                                    </div>
                                @endif
                                <div class="project__info-item">
                                    <div class="icon">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                    <div class="content">
                                        <span>Category:</span>
                                        <h4 class="title">{{ $Project->Category->title }}</h4>
                                    </div>
                                </div>
                                @if($Project->date)
                                    <div class="project__info-item">
                                        <div class="icon">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="content">
                                            <span>Date:</span>
                                            <h4 class="title">{{ $Project->date->format('d F, Y') }}</h4>
                                        </div>
                                    </div>
                                @endif
                                @if($Project->address)
                                    <div class="project__info-item">
                                        <div class="icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="content">
                                            <span>Address:</span>
                                            <h4 class="title">{{ $Project->address }}</h4>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-71">
                        <div class="project__details-content">
                            <span class="sub-title">{{ $Project->Category->title }}</span>
                            <h2 class="title">{{ $Project->title }}</h2>
                            {!! $Project->content !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="project__details-img">
                <div class="row">
                    <div class="swiper fix blog-thumb-active">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="blog-details.html"><img src="assets/img/blog/blog_img02.jpg" alt="img"></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="blog-details.html"><img src="assets/img/blog/blog_img03.jpg" alt="img"></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="blog-details.html"><img src="assets/img/blog/blog_img02.jpg" alt="img"></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="blog-details.html"><img src="assets/img/blog/blog_img03.jpg" alt="img"></a>
                            </div>
                        </div>
                        <div class="blog__post-thumb-nav">
                            <button class="blog-button-prev"><i class="renova-right-arrow"></i></button>
                            <button class="blog-button-next"><i class="renova-right-arrow"></i></button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- project-details-area-end -->
    <x-CTA />
@endsection