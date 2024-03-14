@extends('en.layouts.master')
@section('title')
    Water Technologies | Watec Distribution
@endsection
@section('meta')
    <meta name="description"
        content="Watec Distribution is your trusted partner for all your needs in pools, water treatment, pumping, and renewable energy..." />
@endsection
@section('css')
    <style>
        .page-header {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{ asset('assets/imgs/products-header.webp') }}) center center no-repeat;
            background-size: cover;
            /**/
        }
    </style>
@endsection
@section('content')
    <div class="view-products-content">
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4 animated slideInDown">@lang('messages.products')</h1>
            </div>
        </div>
        <!-- Page Header End -->
        {{-- Start Breadcump --}}
        <div class="container">
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('en.home') }}">@lang('messages.home')</a></li>
                    </li>
                    <li class="breadcrumb-item text-primary"><a href="{{ route('en.products.all') }}">@lang('messages.products')</a>
                    </li>
                    @isset($categoryName)
                        <li class="breadcrumb-item text-primary" aria-current="page">{{ $categoryName }}</li>
                    @endisset

                </ol>
            </nav>
        </div>
        {{-- End Breadcump --}}

        <!-- Content Start -->
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="aside-categories mb-3">
                        <div class="card">
                            <div class="card-header">Categories</div>
                            <div class="card-body">
                                <div class="accordion" id="accordionExample">
                                    @foreach (\App\Http\Controllers\CategoryController::getMainCategories() as $key => $main_cat)
                                        <div class="accordion-item">
                                            @if ($main_cat->children->count() > 0)
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $main_cat->id }}" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        <a href="{{ route('en.category.show', $main_cat) }}"
                                                            class="prop-btn">
                                                            {{ $main_cat->en_name }} </a>
                                                    </button>
                                                </h2>
                                                {{-- <div id="collapse{{ $main_cat->id }}"
                                                class="accordion-collapse collapse @if ($key == 0) show @endif"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample"> --}}
                                                <div id="collapse{{ $main_cat->id }}" class="accordion-collapse collapse"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <ul class="list-unstyled">
                                                            @foreach (\App\Http\Controllers\CategoryController::getChildsCategories($main_cat->id) as $cat)
                                                                <li><i class="fas fa-angle-right"></i> <a
                                                                        href="{{ route('en.category.show', $cat) }}">{{ $cat->en_name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @else
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button remove-accordion-arrow collapsed"
                                                        type="button">
                                                        <a href="{{ route('en.category.show', $main_cat) }}"
                                                            class="prop-btn">
                                                            {{ $main_cat->en_name }} </a>
                                                    </button>
                                                </h2>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('en.components/shopPub')
                    @if ($promotedProduct)
                        <div class="aside-products d-none d-md-block">
                            <div class="product-card">
                                <div class="badge">Popular</div>
                                <div class="product-tumb">
                                    <img src="{{ asset('uploads/products/' . explode(',', $promotedProduct->image)[0]) }}"
                                        alt="{{ $promotedProduct->en_name }}">
                                </div>
                                <div class="product-details">
                                    <span class="product-category">{{ $promotedProduct->category->en_name }}</span>
                                    <h5><a href="">{{ $promotedProduct->en_name }}</a></h5>
                                    <p>Take advantage of this opportunity to get this quality item at a great price!</p>
                                    <div class="product-bottom-details text-center">
                                        <a href="{{ route('en.product.details', $promotedProduct->en_slug) }}"
                                            class="btn btn-primary text-white rounded">View Product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-9 products-items">
                    <div class="row px-xl-5 pb-3">
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6 col-sm-12 pb-1 mb-2">
                                    {{-- <a href="{{ route('en.product.details', $product->en_slug) }}"> --}}
                                    <a href="{{ route('en.product.details', $product->en_slug) }}">
                                        <div class="card product-item border-0 mb-4">
                                            <div
                                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                                <img class="img-fluid w-100"
                                                    src="{{ asset('/uploads/products/' . explode(',', $product->image)[0]) }}"
                                                    alt="{{ $product->en_name }}">
                                            </div>
                                            <div class="card-body border-left border-right p-1">
                                                <p>{{ $product->category->en_name }}</p>
                                                <h6 class="text-truncate" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ $product->en_name }}">{{ $product->en_name }}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center p-5">There are no products in this category</p>
                        @endif
                    </div>
                    {{-- Start Pagination --}}
                    <div class="pagination-box">
                        {{ $products->links('vendor.pagination.bootstrap-5') }}
                    </div>
                    {{-- End Pagination --}}
                </div>
            </div>
        </div>
        <!-- Content End -->
    </div>
@endsection
@section('js')
    <script>
        $(".prop-btn").click(function(event) {
            event.stopPropagation();
            window.open($(this).attr('href'), '_self');
        });
    </script>
@endsection
