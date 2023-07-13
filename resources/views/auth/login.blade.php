<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>(PLPWSMS)-Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{asset("plugins/fontawesome-free/css/all.min.css") }}>
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href={{asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{asset("dist/css/adminlte.min.css") }}>
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- jQuery -->
    <script src={{asset("plugins/jquery/jquery.min.js") }}></script>
</head>

<body class="hold-transition login-page">
    @if (session('success'))
        <script>
            $(document).ready(function() {
                toastr.success('{{ session('success') }}');
            });
        </script>
    @elseif (session('error'))
        <script>
            $(document).ready(function() {
                toastr.error('{{ session('error') }}');
            });
        </script>
    @endif

    @if ($errors->has('email'))
        <script>
            $(document).ready(function() {
                toastr.error('{{ $errors->first('email') }}');
            });
        </script>
    @endif

    @if ($errors->has('password'))
        <script>
            $(document).ready(function() {
                toastr.error('{{ $errors->first('password') }}');
            });
        </script>
    @endif


    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>[PLPWSMS]</b></a>
            </div>
            <div class="card-body">

                <p class="login-box-msg">| User Login Panel |</p>

                <form action="{{route('authentication')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control"  autocomplete="off" placeholder="Enter your email...." required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control"  autocomplete="off" placeholder="************" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>

                    <div class="social-auth-links text-center mt-2 mb-3">
                        <div class="row">
                            <div class="col col-md-12">
                                <button type="submit" class="btn btn-block btn-primary"><span class="fa fa-sign-in"></span> Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src={{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <!-- AdminLTE App -->
    <script src={{asset("dist/js/adminlte.min.js")}}></script>
</body>

</html>
