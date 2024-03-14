@extends('layouts.master')
@section('title')
    Watec Distribution | La meilleure agence spécialisée dans la distribution des technologies de l’eau
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
    {{-- Start Breadcump --}}
    <div class="container">
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">@lang('messages.about')</li>
            </ol>
        </nav>
    </div>
    {{-- End Breadcump --}}

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
                        Nous sommes une entreprise leader dans ce domaine, nous fournissons des produits spécifiques pour
                        tous nos clients.</h4>
                    <p>
                        Avec une expérience de plus d'une trentaine d'années, et des fabricants de renommé mondial, WATEC
                        DISTRIBUTION propose à ses clients la gamme la plus étendue du marché d'équipements de piscine & de
                        bien-être & traitement des eaux & Pompage et robinetterie & Energie renouvelable ... , destinée aux
                        installateurs et aux revendeurs.
                        Ses ingénieurs qualifiés rompus aux innovations veillent aux choix des meilleurs équipements et des
                        dernières technologies, en mettant tout leurs savoir-faire à la disposition de leurs clients :
                    <p> - Grace à son système d'achat « Tech Assist » et ses choix «< Direct Factory>>,
                            la société WATEC DISTRIBUTION garantie la disponibilité des pièces détachées d'origine.</p>
                    <p> -Les clients de WATEC DISTRIBUTION, bénéficient également des formations sur les nouveaux
                        produits.</p>
                    </p>
                </div>
            </div>
            <div class="row mb-3" style="background: #fafafa;">
                <div class="col-md-6 p-5">
                    <h4 style="color: #4e5252;" class="mb-3">Notre entreprise est fière de proposer ses services dans
                        plusieurs villes du
                        Maroc</h4>
                    <p>
                        Nous sommes présents dans des villes telles que Mohammedia , Casablanca, Marrakech, Tanger, Fès,
                        Agadir et bien
                        d'autres encore.
                        Nous offrons une gamme de services variés pour répondre aux besoins de nos clients. Que ce
                        soit pour des services de <strong>Traitement de l’eau (domestique et industrielle)</strong>,
                        <strong>Pompage et robinetterie</strong>,
                        <strong>Piscine et bien être</strong> ,<strong>Epuration et Réutilisation des eaux usées</strong>...
                        , notre équipe
                        d'experts est prête à vous aider. Nous sommes engagés à fournir des services de qualité supérieure à
                        des tarifs compétitifs, et nous travaillons constamment pour améliorer notre offre et satisfaire nos
                        clients. Contactez-nous dès aujourd'hui pour découvrir comment nous pouvons vous aider à répondre à
                        vos besoins en matière de services dans les villes du Maroc où nous opérons.
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
    @include('components/marks');
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
