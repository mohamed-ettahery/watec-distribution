@extends('layouts.master')
@section('title')
    Piscines, Traitement d'eau, Pompage, Energie renouvelable | Watec Distribution
@endsection
@section('meta')
    <meta name="description"
        content="Watec Distribution est votre partenaire de confiance pour tous vos besoins en matière de piscines, traitement d'eau, pompage et énergie renouvelable ..." />
@endsection
@section('css')
    <style>
        .home-carousel {
            height: 78vh;
            overflow: hidden;
            position: relative;
        }

        .home-carousel #header-carousel,
        .home-carousel #header-carousel .carousel-inner,
        .home-carousel #header-carousel .carousel-inner .carousel-item {
            height: 100%;
        }

        .home-carousel #header-carousel .carousel-inner .carousel-item img {
            height: 150%;
        }
    </style>
@endsection
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5 home-carousel">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="assets/imgs/piscine.webp" alt="Piscine background | Watec Distribution">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7 text-start">
                                    <p class="fs-4 text-white animated slideInRight">Bienvenue chez
                                        <strong>Watec disdtribution</strong>
                                    </p>
                                    <h2 class="display-1 text-white mb-4 animated slideInRight h1">Profitez de votre piscine
                                        toute l'année</h2>
                                    <a href="{{ route('products.all') }}"
                                        class="btn btn-primary rounded-pill py-3 px-5 animated slideInRight">Explore
                                        plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="assets/imgs/nature.webp" alt="Nature background | Watec Distribution">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-7 text-end">
                                    <p class="fs-4 text-white animated slideInLeft">Bienvenue chez <strong>Watec
                                            disdtribution</strong>
                                    </p>
                                    <h1 class="text-white mb-5 animated slideInLeft">Traitement de l'eau , Pompes
                                        de piscines , Pompes à chaleur</h1>
                                    <a href="{{ route('products.all') }}"
                                        class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Explore
                                        plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 feature-row">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets/img/icon/icon-1.webp"
                                alt="good quality icon | watec distribution">
                        </div>
                        <h5 class="mb-3">La Qualité</h5>
                        <p class="mb-0">Notre entreprise s'engage à fournir des services de haute qualité</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets/img/icon/icon-2.webp"
                                alt="expertise icon | watec distribution">
                        </div>
                        <h5 class="mb-3">Professionnalisme</h5>
                        <p class="mb-0">Notre entreprise est fière de compter parmi ses rangs des experts</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets/img/icon/icon-3.webp"
                                alt="good prices icon | watec distribution">
                        </div>
                        <h5 class="mb-3">Des prix équitables</h5>
                        <p class="mb-0">nous sommes engagés à offrir les meilleurs prix possibles à nos clients</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets/img/icon/icon-4.webp"
                                alt="support icon | watec distribution">
                        </div>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="mb-0">Nous comprenons l'importance d'un soutien fiable pour nos clients</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- About Start -->
    <div class="container-xxl about my-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/watch?v=0wFAp_NhPKE" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 pt-lg-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white rounded-top p-5 mt-lg-5">
                        <p class="fs-5 fw-medium text-primary">A propos de nous</p>
                        <h2 class="display-6 mb-4">
                            La meilleure agence spécialisée dans la distribution des <span>technologies de l’eau</span></h2>
                        <p>
                            Avec une expérience de plus d'une trentaine d'années, et des fabricants de renommé mondial,
                            <strong>WATEC DISTRIBUTION</strong> propose à ses clients la gamme la plus étendue du marché
                            <strong>Traitement des eaux</strong> et <strong>d'équipements de piscine</strong> &
                            de <strong>bien-être</strong> et <strong>Pompage</strong> & <strong>Robinetterie</strong> et
                            <strong>Enérgie renouvelable</strong>,
                            destinée aux installateurs et aux revendeurs.
                        </p>
                        <div class="row g-5 pt-2 mb-5">
                            <div class="col-sm-6">
                                <img class="img-fluid mb-4" src="assets/img/icon/icon-3.webp"
                                    alt="best prices icon | watec distribution">
                                <h5 class="mb-3">Des prix équitables</h5>
                                <span>nous sommes engagés à offrir les meilleurs prix possibles à nos clients</span>
                            </div>
                            <div class="col-sm-6">
                                <img class="img-fluid mb-4" src="assets/img/icon/icon-2.webp"
                                    alt="great experts icon | watec distribution">
                                <h5 class="mb-3">Des experts dédiés</h5>
                                <span>Notre entreprise est fière de compter parmi ses rangs des experts en distribution des
                                    produits</span>
                            </div>
                        </div>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('about') }}">Explore plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-content-video rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><strong>Profitez de votre piscine</strong></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <video preload="" tabindex="-1" style=""
                            src="{{ asset('/assets/videos/video.mp4') }}" autoplay controls></video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                {{-- <p class="fs-5 fw-medium text-primary">Our Services</p> --}}
                <h2 class="display-5 mb-5 h1">Catégories que nous proposons</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/imgs/cat1.webp"
                                    alt="Adoucisseur icon | watec distribution">
                            </div>
                            <h5 class="mb-3"><strong>Adoucisseur</strong></h4>
                                <p class="mb-0">Solutions d'eau pour toute la maison</p>
                        </div>
                        <div class="service-btn rounded-0 rounded-bottom">
                            <a class="text-primary fw-medium" href="{{ route('category.show', 'adoucissement') }}">Voir
                                plus<i class="bi bi-chevron-double-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/imgs/cat2.webp"
                                    alt="Adoucisseur icon | watec distribution">
                            </div>
                            <h5 class="mb-3"><strong>Filtration</strong></h4>
                                <p class="mb-0">Solutions d'eau pour toute la maison</p>
                        </div>
                        <div class="service-btn rounded-0 rounded-bottom">
                            <a class="text-primary fw-medium" href="{{ route('category.show', 'Filtration') }}">Voir
                                plus<i class="bi bi-chevron-double-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/imgs/swimming-pool.webp"
                                    alt="Adoucisseur icon | watec distribution">
                            </div>
                            <h5 class="mb-3"><strong>Piscine</strong></h4>
                                <p class="mb-0">Solutions d'eau pour toute la maison</p>
                        </div>
                        <div class="service-btn rounded-0 rounded-bottom">
                            <a class="text-primary fw-medium" href="{{ route('category.show', 'piscine') }}">Voir plus<i
                                    class="bi bi-chevron-double-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/imgs/water-pump.webp"
                                    alt="Pompage icon | watec distribution">
                            </div>
                            <h5 class="mb-3"><strong>Pompage</strong></h4>
                                <p class="mb-0">Solutions d'eau pour toute la maison</p>
                        </div>
                        <div class="service-btn rounded-0 rounded-bottom">
                            <a class="text-primary fw-medium" href="{{ route('category.show', 'pompage') }}">Voir
                                plus<i class="bi bi-chevron-double-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/imgs/hydrotherapy.webp"
                                    alt="Spa icon | watec distribution">
                            </div>
                            <h5 class="mb-3"><strong>Spa</strong></h4>
                                <p class="mb-0">Solutions d'eau pour toute la maison</p>
                        </div>
                        <div class="service-btn rounded-0 rounded-bottom">
                            <a class="text-primary fw-medium" href="{{ route('category.show', 'spa') }}">Voir plus<i
                                    class="bi bi-chevron-double-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/imgs/sauna-bag.webp"
                                    alt="SAUNA, HAMMAM icon | watec distribution">
                            </div>
                            <h5 class="mb-3"><strong>SAUNA & HAMMAM</strong></h4>
                                <p class="mb-0">Solutions d'eau pour toute la maison</p>
                        </div>
                        <div class="service-btn rounded-0 rounded-bottom">
                            <a class="text-primary fw-medium"
                                href="{{ route('category.show', 'sauna&hammam&accessoirs') }}">Voir plus<i
                                    class="bi bi-chevron-double-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
    {{-- Start Pub --}}
    @include('components/homepage-pub-new')
    {{-- End Pub --}}
    <!-- Testimonial Start -->
    <!--@include('components/testimonials');-->
    <!-- Testimonial End -->

    {{-- Start Marks --}}
    @include('components/marks');
    {{-- End Marks --}}

    <!-- Quote Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fs-5 fw-medium text-primary">Obtenir un devis</p>
                    <h2 class="display-5 mb-4 h1">Besoin de l'aide de notre expert ? Nous sommes ici !</h2>
                    <p>
                        Ses ingénieurs qualifiés rompus aux innovations veillent aux choix des meilleurs équipements et des
                        dernières technologies, en mettant tout leurs savoir-faire à la disposition de leurs clients :
                    <p> - Grace à son système d'achat « Tech Assist » et ses choix «< Direct Factory>>,
                            la société WATEC DISTRIBUTION garantie la disponibilité des pièces détachées d'origine.</p>
                    <p> -Les clients de WATEC DISTRIBUTION, bénéficient également des formations sur les nouveaux
                        produits.</p>
                    </p>
                    <a class="d-inline-flex align-items-center rounded overflow-hidden border border-primary"
                        href="">
                        <span class="btn-lg-square bg-primary" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </span>
                        <span class="fs-5 fw-medium mx-4 tele_info"></span>
                    </a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <h2 class="mb-4">Obtenir un devis</h2>
                    <form method="post" action="{{ route('contact.send') }}">
                        @csrf
                        <input type="hidden" value="Obtenir un devis" name="subject">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Votre nom">
                                    <label for="name">Votre nom</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="mail"
                                        placeholder="Votre Email">
                                    <label for="mail">Votre Email</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="tele" class="form-control" name="phone" id="mobile"
                                        placeholder="Votre Télephone">
                                    <label for="mobile">Votre Télephone</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" placeholder="Votre message" id="message" style="height: 130px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-100 py-3" type="submit">Envoyér</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote Start -->
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('assets/lib/slick/slick.min.js') }}"></script>
    <script>
        $('.marks-slide').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 4,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }
            ]
        });
            $('.pub-layout-hompage').slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    </script>
@endsection
