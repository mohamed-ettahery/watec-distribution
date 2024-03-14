@extends('en.layouts.master')
@section('title')
    Watec Distribution | The best agency specialized in water technology distribution
@endsection
@section('meta')
    <meta name="description"
        content="WATEC DISTRIBUTION propose à ses clients la gamme la plus étendue du marché Traitement des eaux et d'équipements de piscine & de bien-être et Pompage et Enérgie renouvelable" />
@endsection
@section('css')
    <style>
        .page-header {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{ asset('assets/imgs/nature-morte-representation-chaine-approvisionnement.webp') }}) center center no-repeat;
            background-size: cover;
            /**/
        }
    </style>
@endsection
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h2 class="display-2 text-white mb-4 animated slideInDown">@lang('messages.about')</h2>
        </div>
    </div>
    <!-- Page Header End -->
    {{-- Start Breadcrumb --}}
    <div class="container">
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('en.home') }}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">@lang('messages.about')</li>
            </ol>
        </nav>
    </div>
    {{-- End Breadcrumb --}}

    <!-- About Start -->
    <div class="container-xxl mb-5" style="margin-top: 6rem;">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-6">
                    <img src="{{ asset('assets/imgs/about_3827.webp') }}" style="width: 100%" alt="">
                    {{-- <img src="/assets/imgs/logo.webp" style="width: 100%;transform: rotate(-25deg);" alt=""> --}}
                </div>
                <div class="col-md-6 p-3">
                    <h1 class="lead text-primary">Watec Distribution</h1>
                    <h4 style="color: #4e5252;">
                        We are a leading company in this field, providing specific products for all our customers.</h4>
                    <p>
                        With over thirty years of experience and world-renowned manufacturers, WATEC DISTRIBUTION offers its
                        customers the widest range of swimming pool equipment, wellness, water treatment, pumping and
                        plumbing, renewable energy, etc., intended for installers and resellers.
                        Its qualified engineers, knowledgeable in innovations, ensure the selection of the best equipment
                        and
                        the latest technologies, putting all their know-how at the service of their customers:
                    <p> - Thanks to its "Tech Assist" purchasing system and its "Direct Factory" choices, WATEC DISTRIBUTION
                        guarantees the availability of original spare parts.</p>
                    <p> - WATEC DISTRIBUTION customers also benefit from training on new products.</p>
                    </p>
                </div>
            </div>
            <div class="row mb-3" style="background: #fafafa;">
                <div class="col-md-6 p-5">
                    <h4 style="color: #4e5252;" class="mb-3">Our company is proud to offer its services in several cities
                        in Morocco</h4>
                    <p>
                        We are present in cities such as Mohammedia, Casablanca, Marrakech, Tangier, Fes, Agadir, and many
                        others.
                        We offer a range of varied services to meet the needs of our customers. Whether it is for services
                        related to <strong>Water Treatment (domestic and industrial)</strong>, <strong>Pumping and
                            Plumbing</strong>,
                        <strong>Swimming Pool and Wellness</strong>, <strong>Purification and Reuse of
                            Wastewater</strong>...,
                        our team of experts is ready to help you. We are committed to providing superior quality services at
                        competitive rates, and we constantly work to improve our offering and satisfy our customers. Contact
                        us today to discover how we can help you meet your service needs in the cities of Morocco where we
                        operate.
                    </p>
                </div>
                <div class="col-md-6">
                    {{-- <img src="{{ asset('assets/imgs/map-maroc.webp') }}" style="width: 100%" alt=""> --}}
                    <img src="{{ asset('assets/imgs/map-maroc.gif') }}" style="width: 100%" alt="">
                </div>
            </div>
        </div>
        {{-- <div class="box-map">
            <iframe class="map_info" src="" style="border:0;width: 100%;" height="600" style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div> --}}
    </div>
    <!-- About End -->
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
