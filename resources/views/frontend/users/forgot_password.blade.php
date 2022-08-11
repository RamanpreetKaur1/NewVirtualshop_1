<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Recover Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Bootstrap Css -->
    <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('front/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('front/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />


</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    @if (Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session::get('success_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

                @if (Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session::get('error_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary"> Reset Password</h5>
                                        <p>Re-Password with Skote.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body pt-0">


                            <div class="p-2">
                                <div class="alert alert-success text-center mb-4" role="alert">
                                    Enter your Email and instructions will be sent to you!
                                </div>
                                <form class="form-horizontal" action="{{ url('forgot-password') }}" id="forgotPassword"  method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter email">
                                    </div>

                                    <div class="text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light"
                                            type="submit">Reset</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Remember It ? <a href="{{ url('login') }}" class="fw-medium text-primary"> Sign In here</a> </p>
                        <p>©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                            Themesbrand
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
   <!-- JAVASCRIPT -->
   <script src="{{ asset('front/assets/libs/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('front/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('front/assets/libs/metismenu/metisMenu.min.js') }}"></script>
   <script src="{{ asset('front/assets/libs/simplebar/simplebar.min.js') }}"></script>
   <script src="{{ asset('front/assets/libs/node-waves/waves.min.js') }}"></script>

   <!-- App js -->
   <script src="{{ asset('front/assets/js/app.js') }}"></script>
       <!-- validation init -->
       <script src="{{ asset('front/assets/js/pages/validation.init.js') }}"></script>
       <script src="{{ asset('front/assets/js/jquery.validate.js') }}"></script>
       <script src="{{ asset('front/assets/js/front_script.js') }}"></script>
</body>

</html>
