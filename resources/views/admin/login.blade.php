<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <link href="{{ asset('/assets/imgs/favicon.webp') }}" rel="icon">
    <title>Login</title>
    <link rel="stylesheet" href='{{ asset('/assets/admin/login.css') }}'>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <div class="box-img">
                <img src='{{ asset('/assets/imgs/logo2.webp') }}' alt="">
            </div>
            <form class="login-form" action="{{ route('login.verify') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="email" value="{{ old('email') }}" />
                <input type="password" name="password" placeholder="mot de passe" value="{{ old('password') }}" />
                <button type="submit">Connéxion</button>
                @if (session()->has('error'))
                    <p class="error-message">⛔ {{ session()->get('error') }}</p>
                @endif
                @if ($errors->any())
                    <p class="error-message">⛔ Remplir les champs </p>
                @endif
            </form>
        </div>
    </div>
</body>

</html>
