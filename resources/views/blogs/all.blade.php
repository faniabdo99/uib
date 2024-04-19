@extends('layout.master')
@section('content')
    <!-- breadcrumb-area -->
    <div class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__content">
                        <h2 class="title">Blog</h2>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ route('home') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator">/</span>
                            <span property="itemListElement" typeof="ListItem">BLog</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- blog-post-area -->
    <section class="blog__post-area-three section-py-120">
        <div class="container">
            <div class="row gutter-24">
                <div class="col-lg-8">
                    @forelse($Blogs as $Article)
                        <div class="blog__post-item-two">
                            <div class="blog__post-thumb-two">
                                <a href="{{ route('blog.single' , [$Article->id, $Article->slug]) }}"><img src="{{ $Article->imagePath }}" alt="{{ $Article->title }}"></a>
                            </div>
                            <div class="blog__post-content-two">
                                <div class="blog__post-meta">
                                    <ul class="list-wrap">
                                        <li>By <a href="{{ route('blog.single' , [ $Article->id, $Article->slug ]) }}">{{ $Article->User->name }}</a></li>
                                        <li>{{ $Article->created_at->format('D M, Y') }}</li>
                                    </ul>
                                </div>
                                <h2 class="title"><a href="{{ route('blog.single' , [$Article->id, $Article->slug]) }}">{{ $Article->title }}</a></h2>
                                <p>{{ $Article->description }}</p>
                                <a href="{{ route('blog.single' , [$Article->id, $Article->slug]) }}" class="btn btn-two">Read Details</a>
                            </div>
                        </div>
                    @empty
                        <p>No articles!</p>
                    @endforelse
                </div>
                <div class="col-lg-4">
                    <aside class="blog__sidebar">
                        <div class="blog__widget">
                            <h4 class="blog__widget-title">Recent Posts</h4>
                            <div class="blog__rc-post-wrap">
                                @forelse($Blogs->take(3) as $Article)
                                    <div class="blog__rc-post-item">
                                        <div class="thumb">
                                            <a href="{{ route('blog.single' , [ $Article->id, $Article->slug ]) }}"><img src="{{ $Article->imagePath }}" alt="{{ $Article->title }}"></a>
                                        </div>
                                        <div class="content">
                                            <span class="date"><i class="renova-clock"></i>{{ $Article->created_at->format('D M, Y') }}</span>
                                            <h2 class="title"><a href="{{ route('blog.single' , [ $Article->id, $Article->slug ]) }}">{{ $Article->title }}</a></h2>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-post-area-end -->
    <x-CTA />
@endsection