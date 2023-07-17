<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets-front/css/bootstrap.min.css') }}">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{ asset('assets-front/css/swiper-bundle.min.css') }}" />
    <link href="{{ asset('assets-front/css/aos.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/flasher.min.js') }}"></script>
    @include('seo.index')

    {!! $settings['header_code'] !!}


    <!-- Custom CSS -->
    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('assets-front/css/min.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets-front/css/ar.css') }}">
    @endif
    <style>
        .language a {
            cursor: pointer;
        }
    </style>
    @yield('styles')

</head>

<body style="overflow-x: hidden;">
    <div class="loader">
        <div class="super-spinner"></div>
    </div>
    @yield('after-body')

    <!-- Navigation Bar -->
    <nav data-aos="zoom-out-right"
        class="navbar navbar-expand-lg navbar-light bg-light fixed-top {{ Request::is('/') ? '' : 'navbar-scrolled' }}"
        id="navbar">
        <div class="container-fluid nav-bar-custom">
            <a class="navbar-brand" href="{{ url('/') }}">
                @if (Request::is('/'))
                    <img loading="lazy" src="{{ asset('assets-front/imgs/logo.png') }}" class="logo pb-1 ml-3">
                @else
                    <img loading="lazy" src="{{ asset('assets-front/imgs/logo-white.png') }}" class="logo pb-1 ml-3">
                @endif
            </a>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon border-0"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav {{ App::getLocale() == 'en' ? 'ml-auto' : 'mr-auto' }}">

                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('about.page') }}">{{ App::getLocale() == 'en' ? 'About us' : 'نبذة عنا' }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('subsidaries.index_subsidaries') }}">{{ App::getLocale() == 'en' ? 'Our Subsidiaries' : 'شركاؤنا' }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('news.all') }}">{{ App::getLocale() == 'en' ? 'News & Updates' : 'الأخبار والمستجدات' }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('career.index_career') }}">{{ App::getLocale() == 'en' ? 'Careers ' : 'الوظائف' }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('contact') }}">{{ App::getLocale() == 'en' ? 'Contact us' : 'تواصل معنا' }}</a>
                    </li>
                    <li class="nav-item" style="padding-top: 2px;">
                        <span class="language">
                            <a class="nav-link float-left pr-0 {{ App::getLocale() == 'en' ? 'active' : '' }}"
                                onclick="changeLanguage('en')">EN</a>
                            <span class="nav-link float-left px-0 slash">/</span>
                            <a class="nav-link float-left pl-0 {{ App::getLocale() == 'ar' ? 'active' : '' }}"
                                onclick="changeLanguage('ar')">AR</a>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation Bar -->



    @yield('content')



    <!-- Start Footer -->
    <footer data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="pt-5" style="background-color: #845930;">
        <div class="row">
            <div class="col-md-3 pb-4 pb-lg-4 text-center ">
                <img loading="lazy" src="{{ $settings['get_website_wide_logo'] }}" width="40%" class="pt-3">
            </div>
            <div class="col-md-5">
                <div class="footer_sub">
                    <h5 class="text-uppercase font-weight-bold text-center text-lg-left pb-4 text-white"
                        style="font-size: 15px;">
                        {{ App::getLocale() == 'en'?$settings['address']:$settings['address_ar'] }}
                    </h5>
                    <p class="text-uppercase font-weight-normal text-center text-lg-left pb-4 text-white"
                        style="font-size: 15px;">COPYRIGHT © {{ date('Y') }} {{ $settings['website_name'] }}, ALL
                        RIGHTS RESERVED</p>
                </div>
            </div>

            <div class="col-md-4">
                <ul class="social-icons">
                    @if ($settings['facebook_link'] != null)
                        <li><a target="_blank" href="{{ $settings['facebook_link'] }}"><i
                                    class="fab fa-facebook-f"></i></a></li>
                    @endif
                    @if ($settings['twitter_link'] != null)
                        <li><a target="_blank" href="{{ $settings['twitter_link'] }}"><i
                                    class="fab fa-twitter"></i></a></li>
                    @endif
                    @if ($settings['instagram_link'] != null)
                        <li><a target="_blank" href="{{ $settings['instagram_link'] }}"><i
                                    class="fab fa-instagram"></i></a></li>
                    @endif
                    @if ($settings['youtube_link'] != null)
                        <li><a target="_blank" href="{{ $settings['youtube_link'] }}"><i
                                    class="fab fa-youtube"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </footer>
    <!-- End Footer -->


    <!-- jQuery and Bootstrap JS -->
    <script src="{{ asset('assets-front/js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets-front/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets-front/js/bootstrap.min.js') }}"></script>
    <!-- Swiper JS -->
    <script src="{{ asset('assets-front/js/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('assets-front/js/ajax_jquery.min.js') }}"></script>
    <script src="{{ asset('assets-front/js/sweetalert.min.js') }}"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/7b5e9f3ec6.js" crossorigin="anonymous"></script>

    <script src="{{ asset('assets-front/js//aos.js') }}"></script>
    
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets-front/js/min.js') }}"></script>
    <script>
        // Start Navbar onscroll

        @if (Request::is('/'))
            window.onscroll = function() {
                var navbar = document.getElementById("navbar");
                var logo = document.querySelector(".logo");
                if (window.pageYOffset > 200) {
                    navbar.classList.add("navbar-scrolled");
                    logo.src = "{{ asset('assets-front/imgs/logo-white.png') }}"
                } else {
                    navbar.classList.remove("navbar-scrolled");
                    logo.src = "{{ asset('assets-front/imgs/logo.png') }}"
                }
            }
        @endif

        function headerResponsive(){
            var header = document.getElementsByTagName('header')[0];
            if(window.innerWidth < 900 && header != undefined){
                header.style.height= `${window.innerHeight/3}px`;
            }
        }
        headerResponsive();
        window.addEventListener('resize', ()=>{
            headerResponsive();
        })



        //Start Contact-Form
        



        AOS.init({
            disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
            startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
            initClassName: 'aos-init', // class applied after initialization
            animatedClassName: 'aos-animate', // class applied on animation
            useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
            disableMutationObserver: false, // disables automatic mutations' detections (advanced)
            debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
            throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


            // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            offset: 50, // offset (in px) from the original trigger point
            delay: 50, // values from 0 to 3000, with step 50ms
            duration: 900, // values from 0 to 3000, with step 50ms
            easing: 'ease', // default easing for AOS animations
            once: false, // whether animation should happen only once - while scrolling down
            mirror: true, // whether elements should animate out while scrolling past them
            anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
        });

        function changeLanguage(language) {
            axios.get(`/language/${language}`)
                .then(response => {
                    location.reload();
                })
                .catch(error => {
                    console.error(error);
                });
        }

        
    </script>
    @yield('scripts')

</body>

</html>
