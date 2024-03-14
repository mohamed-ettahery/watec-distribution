@extends('en.layouts.master')
@section('title')
    Pools, Water Treatment, Pumping, Renewable Energy | Watec Distribution
@endsection
@section('meta')
    <meta name="description"
        content="Watec Distribution is your trusted partner for all your needs in pools, water treatment, pumping, and renewable energy..." />
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
                                    <p class="fs-4 text-white animated slideInRight">Welcome to
                                        <strong>Watec Distribution</strong>
                                    </p>
                                    <h2 class="display-1 text-white mb-4 animated slideInRight h1">Enjoy your pool all year
                                        round</h2>
                                    <a href="{{ route('en.products.all') }}"
                                        class="btn btn-primary rounded-pill py-3 px-5 animated slideInRight">Explore
                                        more</a>
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
                                    <p class="fs-4 text-white animated slideInLeft">Welcome to <strong>Watec
                                            Distribution</strong></p>
                                    <h1 class="text-white mb-5 animated slideInLeft">Water Treatment, Pool Pumps, Heat Pumps
                                    </h1>
                                    <a href="{{ route('en.products.all') }}"
                                        class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Explore more</a>
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
                        <h5 class="mb-3">Quality</h5>
                        <p class="mb-0">Our company is committed to providing high-quality services</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets/img/icon/icon-2.webp"
                                alt="expertise icon | watec distribution">
                        </div>
                        <h5 class="mb-3">Professionalism</h5>
                        <p class="mb-0">Our company is proud to have experts among its ranks</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets/img/icon/icon-3.webp"
                                alt="good prices icon | watec distribution">
                        </div>
                        <h5 class="mb-3">Fair Prices</h5>
                        <p class="mb-0">We are committed to offering the best possible prices to our customers</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets/img/icon/icon-4.webp"
                                alt="support icon | watec distribution">
                        </div>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="mb-0">We understand the importance of reliable support for our customers</p>
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
                        <p class="fs-5 fw-medium text-primary">About Us</p>
                        <h2 class="display-6 mb-4">
                            The best agency specializing in the distribution of <span>water technologies</span></h2>
                        <p>
                            With over thirty years of experience and world-renowned manufacturers, <strong>WATEC
                                DISTRIBUTION</strong>
                            offers its customers the widest range in the market of <strong>Water Treatment</strong> and
                            <strong>Swimming Pool Equipment</strong>
                            & <strong>Wellness</strong> and <strong>Pumping</strong> & <strong>Fittings</strong> and
                            <strong>Renewable Energy</strong>,
                            intended for installers and resellers.
                        </p>
                        <div class="row g-5 pt-2 mb-5">
                            <div class="col-sm-6">
                                <img class="img-fluid mb-4" src="assets/img/icon/icon-3.webp"
                                    alt="best prices icon | watec distribution">
                                <h5 class="mb-3">Fair Prices</h5>
                                <span>We are committed to offering the best possible prices to our customers</span>
                            </div>
                            <div class="col-sm-6">
                                <img class="img-fluid mb-4" src="assets/img/icon/icon-2.webp"
                                    alt="great experts icon | watec distribution">
                                <h5 class="mb-3">Dedicated Experts</h5>
                                <span>Our company is proud to have experts among its ranks in product distribution</span>
                            </div>
                        </div>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('en.about') }}">Explore more</a>
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
                    <h3 class="modal-title" id="exampleModalLabel"><strong>Enjoy your swimming pool</strong></h3>
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
                <h2 class="display-5 mb-5 h1">Categories We Offer</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/imgs/cat1.webp"
                                    alt="Water Softener icon | Watec Distribution">
                            </div>
                            <h5 class="mb-3"><strong>Water Softener</strong></h4>
                                <p class="mb-0">Whole house water solutions</p>
                        </div>
                        <div class="service-btn rounded-0 rounded-bottom">
                            <a class="text-primary fw-medium"
                                href="{{ route('en.category.show', 'softening') }}">Learn More<i
                                    class="bi bi-chevron-double-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/imgs/cat2.webp"
                                    alt="Filtration icon | Watec Distribution">
                            </div>
                            <h5 class="mb-3"><strong>Filtration</strong></h4>
                                <p class="mb-0">Whole house water solutions</p>
                        </div>
                        <div class="service-btn rounded-0 rounded-bottom">
                            <a class="text-primary fw-medium" href="{{ route('en.category.show', 'filtration') }}">Learn
                                More<i class="bi bi-chevron-double-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/imgs/swimming-pool.webp"
                                    alt="Swimming Pool icon | Watec Distribution">
                            </div>
                            <h5 class="mb-3"><strong>Swimming Pool</strong></h4>
                                <p class="mb-0">Whole house water solutions</p>
                        </div>
                        <div class="service-btn rounded-0 rounded-bottom">
                            <a class="text-primary fw-medium" href="{{ route('en.category.show', 'pool') }}">Learn
                                More<i class="bi bi-chevron-double-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/imgs/water-pump.webp"
                                    alt="Pumping icon | Watec Distribution">
                            </div>
                            <h5 class="mb-3"><strong>Pumping</strong></h4>
                                <p class="mb-0">Whole house water solutions</p>
                        </div>
                        <div class="service-btn rounded-0 rounded-bottom">
                            <a class="text-primary fw-medium" href="{{ route('en.category.show', 'pumping') }}">Learn
                                More<i class="bi bi-chevron-double-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/imgs/hydrotherapy.webp"
                                    alt="Hydrotherapy icon | Watec Distribution">
                            </div>
                            <h5 class="mb-3"><strong>Spa</strong></h4>
                                <p class="mb-0">Whole house water solutions</p>
                        </div>
                        <div class="service-btn rounded-0 rounded-bottom">
                            <a class="text-primary fw-medium" href="{{ route('en.category.show', 'spa') }}">Learn
                                More<i class="bi bi-chevron-double-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/imgs/sauna-bag.webp"
                                    alt="Sauna, Hammam icon | Watec Distribution">
                            </div>
                            <h5 class="mb-3"><strong>Sauna & Hammam</strong></h4>
                                <p class="mb-0">Whole house water solutions</p>
                        </div>
                        <div class="service-btn rounded-0 rounded-bottom">
                            <a class="text-primary fw-medium"
                                href="{{ route('en.category.show', 'sauna-hammam-accessories') }}">Learn More<i
                                    class="bi bi-chevron-double-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service End -->
    {{-- Start Pub --}}
    @include('en.components/homepage-pub-new')
    {{-- End Pub --}}
    <!-- Testimonial Start -->
    <!--@include('en.components/testimonials');-->
    <!-- Testimonial End -->

    {{-- Start Marks --}}
    @include('en.components/marks');
    {{-- End Marks --}}

    <!-- Quote Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fs-5 fw-medium text-primary">Get a Quote</p>
                    <h2 class="display-5 mb-4 h1">Need help from our expert? We're here!</h2>
                    <p>
                        Our qualified engineers are well-versed in innovations and ensure the selection of the best
                        equipment
                        and the latest technologies, putting all their expertise at the service of their clients:
                    </p>
                    <p>
                        - Thanks to its "Tech Assist" purchasing system and its "Direct Factory" choices, WATEC DISTRIBUTION
                        guarantees the availability of original spare parts.
                    </p>
                    <p>
                        - WATEC DISTRIBUTION customers also benefit from training on new products.
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
                    <h2 class="mb-4">Get a Quote</h2>
                    <form method="post" action="{{ route('en.contact.send') }}">
                        @csrf
                        <input type="hidden" value="Get a Quote" name="subject">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Your name">
                                    <label for="name">Your name</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="mail"
                                        placeholder="Your Email">
                                    <label for="mail">Your Email</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" name="phone" id="mobile"
                                        placeholder="Your Phone">
                                    <label for="mobile">Your Phone</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" placeholder="Your message" id="message" style="height: 130px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send</button>
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
