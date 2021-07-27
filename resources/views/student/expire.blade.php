<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Ipack - Newcambridge</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                            
                                <div class="text-center mt-4">
                                    <h1 class="text-error">Expire</h1>
                                    <h3 class="mt-3 mb-2">Internal Server Error</h3>
                                    <p class="text-muted mb-3">Why not try refreshing your page? or you can contact <a href="" class="text-dark"><b>Support</b></a></p>

                                    <a href="{{ route('user_logout') }}" class="btn btn-success waves-effect waves-light">
                                        <span>Back to Home</span>
                                    </a>
                                </div>

                            </div> <!-- end card-body -->        
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <!-- Vendor js -->
        <script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('public/assets/js/app.min.js') }}"></script>
        
    </body>
</html>