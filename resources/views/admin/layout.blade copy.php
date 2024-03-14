<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page')</title>

    <!-- Favicon -->
    <link href='{{ asset('/assets/imgs/favicon.webp') }}' rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">
    {{-- Fonts icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- DataTable --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

    {{-- main css --}}
    <link rel="stylesheet" href='{{ asset('/assets/admin/main.css') }}'>
    @yield('css')
</head>

<body>
    <div class='dashboard'>
        <div class="dashboard-nav">
            <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                {{-- <a href="#" class="brand-logo"><span>WATEC</span></a> --}}
                <a href="#" class="brand-logo" style="font-family: cursive;"><img src="/assets/imgs/favicon.webp"
                        style="width: 38px;" alt="logo"><span>ADMIN</span></a>
            </header>
            <nav class="dashboard-nav-list">
                <a href="/admin" class="dashboard-nav-item {{ Request::is('admin') ? 'active' : '' }}"><i
                        class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                <a href="{{ route('categories.index') }}"
                    class="dashboard-nav-item {{ Request::is('admin/categories') ? 'active' : '' }}"><i
                        class="fa-solid fa-layer-group"></i>Catégories </a>
                <a href="{{ route('products.index') }}"
                    class="dashboard-nav-item {{ Request::is('admin/products') ? 'active' : '' }}"><i
                        class="fa-solid fa-puzzle-piece"></i> Produits</a>
                <a href="{{ route('marks.index') }}"
                    class="dashboard-nav-item {{ Request::is('admin/marks') ? 'active' : '' }}"><i
                        class="fa-solid fa-bandage"></i>
                    Marques </a>
                <a href="{{ route('newspapers.index') }}"
                    class="dashboard-nav-item {{ Request::is('admin/newspapers') ? 'active' : '' }}"><i
                        class="fa-solid fa-newspaper"></i>
                    Journaux </a>
                <a href="{{ route('admins.index') }}"
                    class="dashboard-nav-item {{ Request::is('admin/admins') ? 'active' : '' }}"><i
                        class="fa-solid fa-user-tie"></i>
                    Admins </a>
                <a href="/admin/settings"
                    class="dashboard-nav-item {{ Request::is('admin/settings') ? 'active' : '' }}"><i
                        class="fas fa-cogs"></i> Paramétres </a>
                <div class="nav-item-divider"></div>
                <a href="{{ route('login.logout') }}" class="dashboard-nav-item "><i class="fas fa-sign-out-alt"></i>
                    Déconnexion </a>
            </nav>
        </div>
        <div class='dashboard-app'>
            <header class='dashboard-toolbar'>
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                        </div>
                        <div class="col-6" style="text-align: -webkit-right;">
                            <div class="dropdown dropdown-user">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    @php
                                        $main_admin = DB::table('admins')
                                            ->where('id', session()->get('admin'))
                                            ->first();
                                    @endphp
                                    <img src="{{ asset('uploads/profiles/' . $main_admin->image) }}" width="35px"
                                        class="rounded-circle mx-2" alt=""><span>{{ $main_admin->name }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-user">
                                    <li><a class="dropdown-item" href="{{ route('setting.profile') }}"><i
                                                class="fa-solid fa-address-card"></i>
                                            Modifier Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('setting.passwordForm') }}"><i
                                                class="fa-solid fa-key"></i> Mot de
                                            passe</a></li>
                                    <hr />
                                    <li><a class="dropdown-item" href="{{ route('login.logout') }}"><i
                                                class="fa-solid fa-power-off"></i>
                                            Déconnexion</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class='dashboard-content'>
                <div class='container'>
                    @if (session()->has('success'))
                        {{-- <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div> --}}
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    {{-- dataTable --}}
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src='{{ asset('/assets/admin/main.js') }}'></script>
    @yield('js')
</body>

</html>
