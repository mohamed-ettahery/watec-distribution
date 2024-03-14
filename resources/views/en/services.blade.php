@extends('en.layouts.master')
@section('meta')
    <meta name="description"
        content="Watec Distribution is your trusted partner for all your needs in pools, water treatment, pumping, and renewable energy..." />
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick-theme.css') }}" />
    <style>
        .page-header {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{ asset('assets/imgs/features-header.webp') }}) center center no-repeat;
            background-size: cover;
            /**/
        }

        .features .btn-square i {
            font-size: 50px;
            /* color: #4761ff; */
            background: -webkit-linear-gradient(#98f3ff, #4761ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
@endsection
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">@lang('messages.services')</h1>
        </div>
    </div>
    <!-- Page Header End -->
    {{-- Start Breadcump --}}
    <div class="container">
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('en.home') }}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">@lang('messages.services')</li>
            </ol>
        </nav>
    </div>
    {{-- End Breadcump --}}

    <!-- Features Start -->
    <div class="features container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 700px;">
                <p class="fs-5 fw-medium text-primary">Our Services</p>
                <h3 class="display-5 mb-5">Watec Distribution Offers You the Distribution of:</h3>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                                <i class="fas fa-tint"></i>
                            </div>
                            <h5 class="mb-3">Water Treatment</h5>
                            <p class="mb-0">We offer water treatment solutions to improve the quality of the water you use
                                at home or in your business.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                                <i class="fas fa-swimming-pool"></i>
                            </div>
                            <h5 class="mb-3">Pool and Wellness</h5>
                            <p class="mb-0">If you're looking to create a relaxation space in your home, our team can help
                                you build a custom pool or spa.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                                <i class="fas fa-shower"></i>
                            </div>
                            <h5 class="mb-3">Pumping and Fittings</h5>
                            <p class="mb-0">We offer pumping and fittings solutions for businesses and individuals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                                <i class="fas fa-solar-panel"></i>
                            </div>
                            <h5 class="mb-3">Renewable Energy</h5>
                            <p class="mb-0">We are committed to helping our planet by offering renewable energy solutions.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features End -->


    {{-- Start Marks --}}
    @include('en.components/marks');
    {{-- End Marks --}}
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
    </script>
@endsection
