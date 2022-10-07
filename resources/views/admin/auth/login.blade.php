
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

    <title>Admin Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>
<body style="background-color: rgba(212, 212, 212, 0.452);">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                @if (session()->has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session()->get('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <h1 class="h5 text-gray-900 mb-5">Sistem Administrasi Dan Informasi <br> Sun Swimming Course</h1>
                            </div>
                            <form class="user" action="{{ route('login') }}" method="post">
                                @csrf
        
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Username">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('template-admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('template-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('template-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('template-admin/js/sb-admin-2.min.js') }}"></script>

</body>
</html>