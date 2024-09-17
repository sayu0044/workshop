<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login & Register</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    <style>
        /* Custom CSS to toggle between forms */
        .auth-form-light {
            display: none;
        }

        .auth-form-light.active {
            display: block;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="../../assets/images/logo.svg" alt="logo">
                            </div>

                            <!-- Login Form -->
                            <div id="login-form" class="auth-form-light active">
                                <h4>Login</h4>
                                <form action="{{ route('login.authenticate') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg" name="email"
                                            placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg" name="password"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="mt-3 d-grid gap-2">
                                        <button type="submit"
                                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                            SIGN IN
                                        </button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Don't have an account? <a href="#" class="text-primary"
                                            id="show-register">Create</a>
                                    </div>
                                </form>
                            </div>

                            <!-- Register Form -->
                            <div id="register-form" class="auth-form-light">
                                <h4>Register</h4>
                                <form action="/register" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" name="name"
                                            placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg" name="email"
                                            placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg" name="password"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg"
                                            name="password_confirmation" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="mt-3 d-grid gap-2">
                                        <button type="submit"
                                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                            REGISTER
                                        </button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Already have an account? <a href="#" class="text-primary"
                                            id="show-login">Sign In</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Custom JS to toggle between forms -->
    <script>
        document.getElementById('show-register').addEventListener('click', function() {
            document.getElementById('login-form').classList.remove('active');
            document.getElementById('register-form').classList.add('active');
        });

        document.getElementById('show-login').addEventListener('click', function() {
            document.getElementById('register-form').classList.remove('active');
            document.getElementById('login-form').classList.add('active');
        });

        @if ($errors->any())
            Swal.fire({
                title: "Login Gagal",
                text: "{{ $errors->first('email') }}",
                icon: "error"
            });
        @endif
    </script>

    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
