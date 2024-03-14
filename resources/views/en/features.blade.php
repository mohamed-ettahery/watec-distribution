@extends('en.layouts.master')
@section('css')
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
            <h1 class="display-2 text-white mb-4 animated slideInDown">@lang('messages.features')</h1>
        </div>
    </div>
    <!-- Page Header End -->
    {{-- Start Breadcump --}}
    <div class="container">
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('en.home') }}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">@lang('messages.features')</li>
            </ol>
        </nav>
    </div>
    {{-- End Breadcump --}}

    <!-- Features Start -->
    <div class="features container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium text-primary">@lang('messages.features')</p>
                <h3 class="display-5 mb-5">Watec Distribution Offers You</h3>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                                <i class="far fa-gem"></i>
                            </div>
                            <h5 class="mb-3">Quality</h5>
                            <p class="mb-0">Our company is committed to providing high-quality services to all our
                                clients.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            <h5 class="mb-3">Speed</h5>
                            <p class="mb-0">Our company understands the importance of speed in delivering products to our
                                clients.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                                <i class="fas fa-seedling"></i>
                            </div>
                            <h5 class="mb-3">Solutions</h5>
                            <p class="mb-0">We offer customization options to meet your specific product distribution
                                needs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                                <i class="fas fa-comments-dollar"></i>
                            </div>
                            <h5 class="mb-3">Best Prices</h5>
                            <p class="mb-0">We are committed to offering the best possible prices to our clients.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <h5 class="mb-3">Experts</h5>
                            <p class="mb-0">Our company is proud to have experts in product distribution among its ranks.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                                <i class="far fa-life-ring"></i>
                            </div>
                            <h5 class="mb-3">24/7 Support</h5>
                            <p class="mb-0">We understand the importance of reliable support for our clients, which is why
                                we offer 24/7 support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features End -->


    <!-- Testimonial Start -->
    <!--@include('en/components/testimonials');-->
    <!-- Testimonial End -->
@endsection
