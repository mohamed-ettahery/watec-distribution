@extends('en.layouts.master')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">404 Error</h1>
        </div>
    </div>
    <!-- Page Header End -->
    {{-- Start Breadcump --}}
    <div class="container">
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('messages.home')</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">404</li>
            </ol>
        </nav>
    </div>
    {{-- End Breadcump --}}

    <!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">404</h1>
                    <h1 class="mb-4">Page not found</h1>
                    <p class="mb-4">We're sorry, the page you were looking for doesn't exist on our website! Perhaps go to
                        our homepage or try using a search?</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('en.home') }}">Back to homepage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->
@endsection
