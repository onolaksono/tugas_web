<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK MANDIRI</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets-admin/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/app.css') }}">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <a href="{{ url('/') }}" class="btn btn-secondary btn-sm mb-3">
                        <i data-feather="arrow-left" class="me-1"></i> Kembali
                    </a>
                    <div class="card pt-4">
                        <div class="card-body">
                            <!-- Tombol kembali -->


                            @if (session('login_error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong> {{ session('login_error') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="text-center mb-5">
                                <img src="{{ asset('assets-admin/images/favicon.svg') }}" height="48" class='mb-4'>
                                <h3>Login</h3>
                                <p>Silahkan login untuk Admin</p>
                            </div>
                            <form action="" method="post">
                                @csrf
                                <div class="form-group position-relative has-icon-left">
                                    <label for="email">email</label>
                                    <div class="position-relative">
                                        <input type="email" class="form-control" id="email" name="email">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix">
                                    <button class="btn btn-primary float-end">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('assets-admin/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/app.js') }}"></script>

    <script src="{{ asset('assets-admin/js/main.js') }}"></script>
</body>

</html>
