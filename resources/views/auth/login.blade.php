<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Nouglasses</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/school.svg') }}" type="image/x-icon">


    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Tabler Core -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />

    <!-- Tabler Plugins -->
    <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/libs/selectize/dist/css/selectize.css') }}" rel="stylesheet" />

    <style>
        body .page{
            background: url('dist/gudang2.jpg');
            background-size:cover;
            background-position: center center;
        }
    </style>

</head>

<body class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36"
                        alt=""></a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">LOGIN</h2>
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                        @csrf

                        <div class="my-4">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mt-2"
                                name="email" placeholder="Masukkan Alamat Email" value="{{ old('email') }}" tabindex="1"
                                required autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="d-block">
                                <label for="password"
                                    class="control-label @error('password') is-invalid @enderror">Password</label>
                            </div>
                            <input id="password" type="password" class="mt-2 form-control" name="password"
                                placeholder="Masukkan Password" tabindex="2" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100" style="background: orange">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dist/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('dist/js/demo.min.js?1684106062') }}" defer></script>

    <script>
        const loginForm = document.querySelector('form[method="POST"]');
            loginForm.addEventListener("submit", function(event) {
                sessionStorage.setItem("loggedIn", "true");
            });
    </script>


</body>

</html>
