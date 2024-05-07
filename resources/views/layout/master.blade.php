<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>UIB SWISS GMBH - {{ $PageTitle ?? 'United International Business' }}</title>
    <meta name="description" content="{{ $PageDescription ?? 'UIB Swiss - United International Business GmbH' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontello.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tg-cursor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('assets/css/mainAr.css') }}">
    @endif
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LT6JSE6ELT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-LT6JSE6ELT');
    </script>
</head>
<body>
    <!--Preloader-->
    <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="{{ asset('assets/img/logo/preloader.svg') }}" alt="Preloader"></div>
            </div>
        </div>
    </div>
    <!--Preloader-end -->
    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="renova-up-arrow"></i>
    </button>
    <!-- Scroll-top-end-->
    <!-- header-area -->
    <header>
            <div class="tg-header__top">
                <div class="container custom-container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="tg-header__top-menu">
                                <ul class="list-wrap">
                                    <li><a href="{{ route('contact') }}">info@uibswiss.ch</a></li>
                                    <li><a href="{{ route('contact') }}">+1 234 56789</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="tg-header__top-social">
                                <ul class="list-wrap">
                                    <li><a href="https://www.facebook.com/" target="_blank">FB</a></li>
                                    <li><a href="https://twitter.com/home" target="_blank">TW</a></li>
                                    <li><a href="https://www.linkedin.com/" target="_blank">LI</a></li>
                                    <li><a href="https://www.instagram.com/" target="_blank">IN</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="header-fixed-height"></div>
            <div id="sticky-header" class="tg-header__area">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="tgmenu__wrap">
                                <nav class="tgmenu__nav">
                                    <div class="offCanvas-toggle">
                                        <a href="javascript:void(0)" class="menu-tigger">
                                            <img src="{{ asset('assets/img/icons/bar_icon.svg') }}" alt="" class="injectable">
                                        </a>
                                    </div>
                                    <div class="logo">
                                        <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo/uib-logo-title.svg') }}" alt="Logo"></a>
                                    </div>
                                    <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                        <ul class="navigation">
                                            <li @if(request()->route()->getName() == 'home') class="active" @endif><a href="{{ route('home') }}">@lang('navbar.home')</a></li>
                                            <li @if(request()->route()->getName() == 'about') class="active" @endif><a href="{{ route('about') }}">@lang('navbar.about_us')</a></li>
                                            <li @if(request()->route()->getName() == 'services') class="active" @endif><a href="{{ route('services') }}" class="menu-item-has-children">@lang('navbar.services')</a>
                                            <ul class="sub-menu">
                                                @forelse(getFeaturedServices(10) as $FeaturedService)
                                                    <li>
                                                        <a href="{{ route('services.single', [$FeaturedService->id, $FeaturedService->slug]) }}"><i class="renova-right-arrow"></i><span>{{ $FeaturedService->title }}</span></a>
                                                    </li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </li>
                                            <li @if(request()->route()->getName() == 'projects') class="active" @endif><a href="{{ route('projects') }}">@lang('navbar.projects')</a></li>
                                            <li @if(request()->route()->getName() == 'blog') class="active" @endif><a href="{{ route('blog') }}">@lang('navbar.news')</a></li>
                                            <li @if(request()->route()->getName() == 'contact') class="active" @endif><a href="{{ route('contact') }}">@lang('navbar.contact_us')</a></li>
                                        </ul>
                                    </div>
                                    <div class=" tgmenu__navbar-wrap tgmenu__main-menu">
                                        <ul class="list-wrap navigation">
                                            <li class="menu-item-has-children">
                                                <a href="#" class="btn-lang">
                                                @if(session()->get('locale') == 'ar')
                                                    AR
                                                @elseif(session()->get('locale') == 'en' )
                                                    EN
                                                @else
                                                    EN
                                                @endif
                                            </a>
                                                <ul class="sub-menu">
                                                    @if(session()->get('locale') == 'ar')
                                                    <li><a href="{{route('switchLang' , 'en')}}"> En</a></li>
                                                    @elseif(session()->get('locale') == 'en' )
                                                    <li><a href="{{route('switchLang' , 'ar')}}">AR</a></li>
                                                    @else
                                                    <li><a href="{{route('switchLang' , 'en')}}"> En</a></li>
                                                    @endif
                                                </ul>
                                            </li>
                                            <li class="header-btn get-in-touch">
                                                <a href="{{ route('contact') }}" class="btn border-btn">@lang('navbar.get_in_touch')</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mobile-nav-toggler"><i class="tg-flaticon-menu-1"></i></div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu  -->
            <div class="tgmobile__menu">
                <nav class="tgmobile__menu-box">
                    <div class="close-btn"><i class="tg-flaticon-close-1"></i></div>
                    <div class="nav-logo">
                        <a href="index.html"><img src="{{ asset('assets/img/logo/uib-logo-title.svg') }}" alt="Logo"></a>
                    </div>
                    <div class="tgmobile__menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
                    <div class="social-links">
                        <ul class="list-wrap">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="tgmobile__menu-backdrop"></div>
            <!-- End Mobile Menu -->
            <!-- header-search -->
            <div class="search__popup">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="search__wrapper">
                                <div class="search__close">
                                    <button type="button" class="search-close-btn">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="search__form">
                                    <form action="#">
                                        <div class="search__input">
                                            <input class="search-input-field" type="text" placeholder="Type keywords here">
                                            <span class="search-focus-border"></span>
                                            <button>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-popup-overlay"></div>
            <!-- header-search-end -->
            <!-- offCanvas-menu -->
            <div class="offCanvas__info">
                <div class="offCanvas__close-icon menu-close">
                    <button><i class="far fa-window-close"></i></button>
                </div>
                <div class="offCanvas__logo mb-30">
                    <a href="index.html"><img src="{{ asset('assets/img/logo/uib-logo-title.svg') }}" alt="Logo"></a>
                </div>
                <div class="offCanvas__side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>@lang('navbar.office_address')</h4>
                        <p>@lang('navbar.office_location')</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>@lang('navbar.phone_number')</h4>
                        <p>+1 1234 567</p>
                        <p>+1 1234 567</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>@lang('navbar.email_address')</h4>
                        <p>info@uibswiss.ch</p>
                        <p>Wissam@uibswiss.ch</p>
                    </div>
                </div>
                <div class="offCanvas__social-icon mt-30">
                    <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                    <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                    <a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a>
                    <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="offCanvas__overly"></div>
            <!-- offCanvas-menu-end -->
        </header>
    <!-- header-area-end -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- main-area -->
    <main class="main-area fix">
        @yield('content')
    </main>
    <!-- main-area-end -->
    <!-- footer-area -->
    <footer class="footer__area">
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="footer__widget">
                            <div class="footer__logo">
                                <a href="index.html"><img src="{{ asset('assets/img/logo/uib-logo-title.svg') }}" alt="logo"></a>
                            </div>
                            <div class="footer__content">
                                <p>@lang('navbar.footer_content')</p>
                            </div>
                            <div class="footer__social">
                                <ul class="list-wrap">
                                    <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/home" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-3 col-sm-4">
                        <div class="footer__widget">
                            <h4 class="footer__widget-title">@lang('navbar.main_pages')</h4>
                            <div class="footer__widget-link">
                                <ul class="list-wrap">
                                    <li>
                                        <a href="{{ route('about') }}"><i class="renova-right-arrow"></i><span>@lang('navbar.about_us')</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('services') }}"><i class="renova-right-arrow"></i><span>@lang('navbar.services')</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('projects') }}"><i class="renova-right-arrow"></i><span>@lang('navbar.projects')</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog') }}"><i class="renova-right-arrow"></i><span>@lang('navbar.news')</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}"><i class="renova-right-arrow"></i><span>@lang('navbar.contact_us')</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-8 col-md-6 col-sm-12">
                        <div class="footer__widget">
                            <h4 class="footer__widget-title">@lang('navbar.services')</h4>
                            <div class="footer__widget-link">
                                <ul class="list-wrap">
                                    @forelse(getFeaturedServices(6) as $FeaturedService)
                                        <li>
                                            <a href="{{ route('services.single', [$FeaturedService->id, $FeaturedService->slug]) }}"><i class="renova-right-arrow"></i><span>{{ $FeaturedService->title }}</span></a>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                        <div class="footer__widget">
                            <div class="footer__logo text-center">
                                <a href="index.html"><img class="right-logo" src="{{ asset('assets/img/logo/uib-logo.svg') }}" alt="logo"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom footer__bottom-two">
                <div class="row align-items-center">
                        <div class="copyright-text text-center">
                            <p>@lang('footer.rights')</p>
                        </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->
    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.marquee.min.js') }}"></script>
    <script src="{{ asset('assets/js/tg-cursor.min.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/svg-inject.min.js') }}"></script>
    <script src="{{ asset('assets/js/tween-max.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        SVGInject(document.querySelectorAll("img.injectable"));
    </script>
</body>

</html>
