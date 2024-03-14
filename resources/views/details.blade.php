@extends('layouts.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick-theme.css') }}" />
    <style>
        .zoomImg {
            width: 800px !important;
            height: 800px !important;
        }

        .img-showcase {
            overflow: initial !important;
        }
    </style>
@endsection
@section('content')
    {{-- Start Breadcump --}}
    <div class="container mt-5">
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page"><a
                        href="{{ route('category.show', $product->category->slug) }}">{{ $product->category->name }}</a>
                </li>
                <li class="breadcrumb-item text-primary" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
    {{-- End Breadcump --}}
    {{-- Start Details --}}
    <div class="detail-product mt-2">
        <div class="card-wrapper">
            <div class="card mt-3">
                <!-- card left -->
                <div class="product-imgs">
                    <div class="img-display">
                        <div class="img-showcase zoom" id="img-showcase">
                            @foreach ($images as $image)
                                {{-- <img src="/uploads/products/{{ $image }}" alt=""> --}}
                                <img src='{{ asset("/uploads/products/$image") }}' alt="">
                            @endforeach
                            {{-- <img src="/assets/imgs/product.webp" alt="">
                            <img src="/assets/imgs/pompe-filtration.webp" alt="">
                            <img src="/assets/imgs/pack-filtration.webp" alt="">
                            <img src="/assets/imgs/product.webp" alt=""> --}}
                        </div>
                    </div>
                    @if (count($images) > 1)
                        <div class="img-select">
                            @foreach ($images as $key => $image)
                                <div class="img-item">
                                    <a href="#" data-id="{{ $key + 1 }}">
                                        {{-- <img src="/uploads/products/{{ $image }}" alt=""> --}}
                                        <img src='{{ asset("/uploads/products/$image") }}' alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <!-- card right -->
                <div class="product-content">
                    <h1 class="product-title mb-3">{{ $product->name }}</h1>
                    @if (!empty($product->mark))
                        {{-- <a href="{{ $product->mark->url }}" target="blank" class="product-link">
                            <img src="/uploads/marks/{{ $product->mark->image }}" alt="">
                        </a> --}}
                        <a class="product-link">
                            {{-- <img src="/uploads/marks/{{ $product->mark->image }}" alt=""> --}}
                            <img src='{{ asset("/uploads/marks/{$product->mark->image}") }}'
                                @if ($product->mark->name == 'GEMAS') style="width: auto;" @endif alt="">
                        </a>
                    @endif
                    <div class="product-detail">
                        {!! $product->description !!}
                    </div>
                    @php
                        $documents = explode(',', $product->document);
                    @endphp
                    @if ($product->document)
                        <div class="box-download text-end">
                            @foreach ($documents as $document)
                                <a href="{{ asset('uploads/documents/' . $document) }}" target="blank"
                                    class="btn btn-outline-danger">Fiche Téchnique <i class="fas fa-download"></i></a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- End Details --}}
    {{-- Start Details Description --}}
    @if (Str::length($product->details) > 1)
        <div class="more-details mt-5">
            <div class="container">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Description plus détaillé</h5>
                        <div class="product_more_details_content">
                            <p class="card-text">
                                {!! $product->details !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- End Details Description --}}
    {{-- Start Similar Products --}}
    @if (count($similars) > 2)
        <div class="similar-products mt-5">
            <div class="container">
                <div class="card" style="width: 100%;border: none;">
                    <div class="card-body">
                        <h5 class="card-title text-gray">Produits similaires</h5>
                        <div class="main-slide-items">
                            <div class="similar-products-slider">
                                @foreach ($similars as $item)
                                    <div>
                                        <a href="{{ route('product.details', $item->slug) }}">
                                            <div class="card product-item border-0 mb-4 mr-2" style="width: 95%;">
                                                <div
                                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                                    {{-- <img class="img-fluid w-100" style="height: 340px;" --}}
                                                    <img class="img-fluid w-100"
                                                        src="{{ asset('uploads/products/' . $item->image) }}"
                                                        alt="{{ $item->name }}">
                                                </div>
                                                <div class="card-body border-left border-right p-1">
                                                    <p>{{ $item->category->name }}</p>
                                                    <h6 class="text-truncate">{{ $item->name }}</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- End Similar Products --}}
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('assets/lib/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/lib/zoom/zoom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.similar-products-slider').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
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
                            slidesToShow: 1,
                            slidesToScroll: 1
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

            // Zoom
            if (!window.matchMedia("(max-width: 990px )").matches) {
                $('#img-showcase').zoom({
                    duration: 500,
                    zoomWindowWidth: 3000,
                    zoomWindowHeight: 3000
                });
            }
        });

        // Start Product Details
        const imgs = document.querySelectorAll(".img-select a");
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener("click", (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
                $(".zoomImg").attr(
                    "src",
                    imgItem.getElementsByTagName("img")[0].getAttribute("src")
                );
                const displayWidth = document.querySelector(
                    ".img-showcase img:first-child"
                ).clientWidth;
                document.querySelector(".zoomImg").style.transform = `translateX(${
                (imgId - 1) * displayWidth
            }px)`;
                // alert(imgId);
            });
        });

        function slideImage() {
            const displayWidth = document.querySelector(
                ".img-showcase img:first-child"
            ).clientWidth;

            document.querySelector(".img-showcase").style.transform = `translateX(${
            -(imgId - 1) * displayWidth
        }px)`;
        }

        window.addEventListener("resize", slideImage);
        // End Product Details
    </script>
@endsection
