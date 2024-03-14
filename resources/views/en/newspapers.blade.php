@extends('en.layouts.master')
@section('meta')
    <meta name="description"
        content="Watec Distribution est votre partenaire de confiance pour tous vos besoins en matière de piscines, traitement d'eau, pompage et énergie renouvelable ..." />
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick-theme.css') }}" />
    <style>
        .page-header {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{ asset('assets/imgs/newspapers-header-background.webp') }}) center center no-repeat;
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
            <h1 class="display-2 text-white mb-4 animated slideInDown">@lang('messages.news')</h1>
        </div>
    </div>
    <!-- Page Header End -->
    {{-- Start Breadcump --}}
    <div class="container">
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('en.home') }}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">@lang('messages.news')</li>
            </ol>
        </nav>
    </div>
    {{-- End Breadcump --}}

    <!-- Newspapers Start -->
    <div class="newspapers container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 700px; visibility: visible;margin-bottom:40px; animation-delay: 0.1s; animation-name: fadeInUp;">
                <p class="fs-5 fw-medium text-primary">Our Journals</p>
                <h3 class="display-5 mb-5">You can check out the latest updates in our journals</h3>
            </div>
            <div class="row">
                <!-- Left Column: Blog Posts -->
                <div class="col-md-8 wow fadeInLeft">
                    @foreach ($newspapers as $newspaper)
                        <div class="blog-post mb-3">
                            <a href="{{ asset('uploads/newspapers/documents/' . $newspaper->document) }}"
                                class="text-reset">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('uploads/newspapers/images/' . $newspaper->image) }}"
                                            alt="{{ $newspaper->image . ' | Watec Distribution' }}" class="img-fluid">
                                    </div>
                                    <div class="col-md-9">
                                        <h4>{{ $newspaper->en_title }}</h4>
                                        <p class="text-secondary">{!! $newspaper->en_description !!}</p>
                                        <p class="text-muted">{{ $newspaper->newspaper_date }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <hr />
                    @endforeach
                    <!-- Repeat blog-post div for each blog post -->
                    <div class="pagination-box">
                        {{ $newspapers->links('vendor.pagination.bootstrap-5') }}
                    </div>
                    {{-- End Pagination --}}
                </div>

                <!-- Right Column: Sidebar -->
                <div class="col-md-4 wow fadeInRight">
                    <h6 class="text-center">Our Latest Journals</h6>
                    {{-- <ul class="list-group"> --}}
                    <ul>
                        @foreach ($latest_newspapers as $newspaper)
                            <li class="list-group-item">
                                <a href="{{ asset('uploads/newspapers/documents/' . $newspaper->document) }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('uploads/newspapers/images/' . $newspaper->image) }}"
                                                alt="{{ $newspaper->image . ' | Watec Distribution' }}" class="img-fluid">
                                        </div>
                                        <div class="col-md-9">
                                            <h6 class="limit6string">{{ $newspaper->en_title }}</h->
                                                <p class="text-muted">{{ $newspaper->newspaper_date }}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Newspapers End -->


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
