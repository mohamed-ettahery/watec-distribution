<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>
        @yield('title', "Piscines, Traitement d'eau, Pompage, Energie renouvelable | Watec Distribution")
    </title>
    @yield('meta')
    <meta name="keywords"
        content="piscines, traitement de l'eau maroc, pompage, adoucisseurs, osmoseurs, filtres eau maroc, stérilisateurs, technologies de l'eau" />
    <meta name="geo.region" content="MA" />
    <meta name="geo.position" content="31.172821;-7.336248" />
    <meta name="ICBM" content="31.172821, -7.336248" />
    <meta name="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow" />
    <!-- Favicon -->
    <link href="{{ asset('/assets/imgs/favicon.webp') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/lib/fontawesome/css/all.css') }}">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/slick/slick-theme.css') }}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    @yield('css')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-primary text-white d-none d-lg-flex">
        <div class="container py-1">
            <div class="d-flex align-items-center">
                <div class="ms-auto d-flex align-items-center">
                    <small class="ms-4"><i class="fa fa-map-marker-alt me-3"></i><span
                            class="address_info"></span></small>
                    <small class="ms-4"><i class="fa fa-envelope me-3"></i><span class="email_info"></span></small>
                    <small class="ms-4"><i class="fa fa-phone-alt me-3"></i><span class="tele_info"></span></small>
                    <div class="ms-3 d-flex">
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2"
                            href="{{ $site_fb }}" target="blank"><i class="fab fa-facebook-f"></i></a>
                        <!--<a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2"-->
                        <!--    href="{{ $site_twitter }}" target="blank"><i class="fab fa-twitter"></i></a>-->
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2"
                            href="{{ $site_linkedin }}" target="blank"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2"
                            href="{{ $site_instagram }}" target="blank"><i class="fab fa-instagram"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top p-3">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
                <a href="{{ route('home') }}" class="d-block d-md-none">
                    <img src="{{ asset('assets/imgs/logo2.webp') }}" style="width: 185px;margin-top: -14px;"
                        alt="watec distribution logo">
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <a href="{{ route('home') }}" class="navbar-brand d-none d-md-block">
                        <img src="{{ asset('assets/imgs/logo2.webp') }}" style="width: 230px;margin-top: -33px;"
                            alt="watec distribution logo">
                    </a>
                    <div class="navbar-nav mx-auto">
                        <a href="{{ route('home') }}"
                            class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}"><span
                                class="d-blobk d-md-none">@lang('messages.home')</span><i
                                class="fas fa-home d-none d-md-block"
                                style="font-size: 24px;margin-left: 30px;"></i></a>
                        <a href="{{ route('about') }}"
                            class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">@lang('messages.about')</a>
                        <a href="{{ route('services') }}"
                            class="nav-item nav-link {{ Request::is('services') ? 'active' : '' }}">@lang('messages.services')</a>
                        <div class="nav-item dropdown has-megamenu">
                            <a class="nav-link dropdown-toggle go-products-btn {{ Request::is('products') ? 'active' : '' }}"
                                href="{{ route('products.all') }}" data-bs-toggle="dropdown"> @lang('messages.products') </a>
                            <div class="dropdown-menu megamenu  bg-light rounded-0 rounded-bottom m-0"
                                data-bs-toggle="dropdown" role="menu">
                                <div class="container">
                                    <div class="row g-3">
                                        @foreach (\App\Http\Controllers\CategoryController::getMainCategories() as $main_cat)
                                            @if ($main_cat->hasProducts() && $main_cat->children->count() > 0)
                                                {{-- @if ($main_cat->children->where('hasProducts', true)->isNotEmpty()) --}}
                                                <div class="col-md-3">
                                                    <div class="col-megamenu">
                                                        <a class="title h4 mb-2 btn-cat-redirect-products"
                                                            href="{{ route('category.show', $main_cat->slug) }}"><i
                                                                class="fas fa-angle-double-right"></i>
                                                            {{ $main_cat->name }}</a>
                                                        {{-- <a class="title h4 mb-2 btn-cat-redirect-products"
                                                    href="{{ route('category.show', $main_cat) }}"><i
                                                        class="fas fa-angle-double-right"></i>
                                                    {{ $main_cat->name }}</a> --}}
                                                        <ul class="list-unstyled child-items px-3">
                                                            @foreach (\App\Http\Controllers\CategoryController::getChildsCategories($main_cat->id) as $cat)
                                                                @if ($cat->hasProducts())
                                                                    <li><a href="{{ route('category.show', $cat) }}"
                                                                            class="btn-cat-redirect-products"><i
                                                                                class="fas fa-angle-right"></i>
                                                                            {{ $cat->name }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('newspapers') }}"
                            class="nav-item nav-link {{ Request::is('newspapers') ? 'active' : '' }}">@lang('messages.news')</a>
                        <!--<div class="nav-item dropdown">-->
                        <!--    <a href="#"-->
                        <!--        class="nav-link dropdown-toggle {{ Request::is('contact') ? 'active' : '' }}"-->
                        <!--        data-bs-toggle="dropdown">Catalogues</a>-->
                        <!--    <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">-->
                        <!--        <a href="{{ asset('catalogues/traitement-eaux.pdf') }}" class="dropdown-item"-->
                        <!--            target="_blank"><i class="fa-duotone fa-file-pdf"-->
                        <!--                style="--fa-secondary-color: #005eff;"></i> Traitement des eaux</a>-->
                        <!--        <a href="{{ asset('catalogues/piscine-catalogue.pdf') }}" class="dropdown-item"-->
                        <!--            target="_blank"><i class="fa-duotone fa-file-pdf"-->
                        <!--                style="--fa-secondary-color: #005eff;"></i> Piscine</a>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <a href="{{ route('contact') }}"
                            class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">@lang('messages.contact')</a>
                    </div>
                    <div class="ms-auto d-none d-lg-block">
                        <!-- Add the search icon -->
                        <i class="fas fa-search search-icon search-form-icon"></i>

                        <!-- Create a modal for the search form -->
                        <div id="searchModal" class="modal-search-form">
                            <div class="modal-content-search-form text-end">
                                <span class="close-search-form"><i class="fa-duotone fa-xmark"></i></span>
                                <form action="{{ route('search') }}" class="search-form">
                                    <input type="text" class="form-control search-input"
                                        placeholder="Chercher des produits ..." name="term"
                                        value="{{ old('search', $term ?? '') }}" required>
                                    <button type="submit" class="btn btn-search"><i
                                            class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="language-selector text-center">
                        <span>
                            <i class="fa-duotone fa-earth-africa"></i>
                        </span>
                        <select id="languageSelect" class="lang-select">
                            <option value="fr">Français</option>
                            <option value="en">English</option>
                            {{-- <option value="es">Español</option> --}}
                        </select>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
    {{-- Start City Select --}}
    <div class="box-city-select">
        <div class="input-group mb-3">
            <select class="form-select city-select" aria-label="Default select example"
                aria-describedby="basic-addon2">
                <option selected>Mohammedia</option>
                <option>Casablanca</option>
                <option>Agadir</option>
                <option value="Fes">Fes/Meknes</option>
                <option>Marrakech</option>
                {{-- <option>Tanger</option>
                <option>Laayoun</option> --}}
            </select>
            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
        </div>
    </div>
    {{-- End City Select --}}
    {{-- Start Mobile search --}}
    <div class="box-mobile-search d-block d-xl-none">
        <form action="{{ route('search') }}">
            <div class="input-group mb-3">
                <button class="input-group-text btn-serach-mobile btn-outline-primary btn" type="submit"><i
                        class="fas fa-search"></i></button>
                <input type="search" name="term" class="form-control" required
                    placeholder="chercher des produits">
            </div>
        </form>
    </div>
    {{-- End Mobile search --}}
    {{-- Toast Newsletter Start --}}
    @if (session()->has('success_newsletter'))
        <div class="toast newsletter-toast align-items-center" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session()->get('success_newsletter') }}
                </div>
                <button type="button" class="btn-close btn-close-toast me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
    {{-- Toast Newsletter End --}}
    {{-- Start content --}}
    @yield('content')
    {{-- End content --}}
    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">@lang('messages.our_office')</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><span class="address_info"></span></p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><span class="tele_info"></span></p>
                    <p class="mb-2"><i class="fa fa-envelope me-1"></i><span class="email_info"
                            style="font-size: 12px;"></span></p>
                    <div class="d-flex pt-3">
                        <!--<a class="btn btn-square btn-light rounded-circle me-2" href="{{ $site_twitter }}"-->
                        <!--    target="blank"><i class="fab fa-twitter"></i></a>-->
                        <a class="btn btn-square btn-light rounded-circle me-2" href="{{ $site_fb }}"
                            target="blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href="{{ $site_linkedin }}"
                            target="blank"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href="{{ $site_instagram }}"
                            target="blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">@lang('messages.quick_links')</h4>
                    <a class="btn btn-link" href="{{ route('en.features') }}">@lang('messages.features')</a>
                    <a class="btn btn-link" href="{{ route('en.about') }}">@lang('messages.about')</a>
                    <a class="btn btn-link" href="{{ route('en.contact') }}">@lang('messages.contact')</a>
                    <a class="btn btn-link" href="{{ route('en.services') }}">@lang('messages.services')</a>
                    <a class="btn btn-link" href="{{ route('en.TermsConditions') }}">@lang('messages.terms_conditions')</a>
                    <a class="btn btn-link" href="{{ route('en.contact') }}">@lang('messages.support')</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">@lang('messages.working_hours')</h4>
                    <p class="mb-1">Lundi - Vendredi</p>
                    <h6 class="text-light">08:30 am - 06:00 pm</h6>
                    <p class="mb-1">Samedi</p>
                    <h6 class="text-light">08:30 am - 12:30 pm</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">@lang('messages.newsletter')</h4>
                    <p>Nous sommes ravis de vous compter parmi nos visiteurs et
                        nous aimerions vous inviter à vous inscrire à notre newsletter.</p>
                    <form action="{{ route('newsletter.store') }}" method="POST">
                        @csrf
                        <div class="position-relative w-100">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="email" required
                                name="email" placeholder="votre email">
                            <button type="submit"
                                class="btn btn-light py-2 position-absolute top-0 end-0 mt-2 me-2">@lang('messages.register')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-medium text-light" href="{{ route('home') }}">Watec Distribution</a>, Tous
                    les droits sont
                    réservés.
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/lib/slick/slick.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('js')
</body>

</html>
