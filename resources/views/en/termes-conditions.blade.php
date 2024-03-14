@extends('en.layouts.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick-theme.css') }}" />
@endsection
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Terms and Conditions</h1>
        </div>
    </div>
    <!-- Page Header End -->
    {{-- Start Breadcump --}}
    <div class="container">
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('en.home') }}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">Terms and Conditions</li>
            </ol>
        </nav>
    </div>
    {{-- End Breadcump --}}

    <!-- Terms Start -->
    <div class="container-xxl mb-5" style="margin-top: 6rem;">
        <div class="container">
            <h2 class="mb-4 text-center text-primary">Conditions générales d'utilisation</h2>
            <p>
                Bienvenue sur notre site web ! Les présentes conditions générales d'utilisation les conditions s'appliquent
                à
                votre utilisation de notre site web, y compris tout contenu, toute fonctionnalité et tout service offert sur
                ou
                via notre site web.
            </p>

            <h4>1. Acceptation des conditions</h4>
            <p>
                En utilisant notre site web, vous acceptez et vous engagez à respecter ces Conditions. Si vous n'êtes pas
                d'accord avec ces Conditions, vous ne devriez pas utiliser notre site web.
            </p>

            <h4>2. Produits et services</h4>
            <p> Notre site web offre des produits et des services liés à la distribution de produits. Tous les produits et
                services offerts sur ou via notre site web sont soumis à disponibilité et nous nous réservons le droit de
                limiter la quantité de tout produit ou service que nous offrons.
            </p>

            <h4>3. Propriété intellectuelle</h4>
            <p>
                Tous les contenus, logos, marques de commerce et autres matériaux sur notre site web sont la propriété de
                leurs
                propriétaires respectifs et sont protégés par les lois applicables sur la propriété intellectuelle.
            </p>

            <h4>4. Politique de confidentialité</h4>
            <p> Nous prenons la confidentialité de nos utilisateurs très au sérieux.</p>
        </div>
    </div>
    <!-- Terms End -->
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
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
@endsection
