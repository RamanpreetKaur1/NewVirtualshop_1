<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('front/assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('front/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('front/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />


    </head>

    <body>

        {{-- <div class="main-content"> --}}

            <div class="page-content">
                <div class="container">

                    <!-- start page title -->
                    <div class="row">
                        @if (Session::has('error_message'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							{{ session::get('error_message') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert"
								aria-label="Close"></button>
						</div>
						@endif
						@if (Session::has('success_message'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session::get('success_message') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert"
								aria-label="Close"></button>
						</div>
						@endif
                        <div class="col-12">
                            <div class="bg-primary bg-soft">

                                <div class="row">


                                    <div class="">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary text-center font-size-18">Register</h5>
                                            {{-- <p>Create your seller  account</p> --}}
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Basic Information</h4>
                                    <p class="card-title-desc">Fill all information below</p>

                                    <form method="POST" action="{{ route('seller-registration') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="name">Name</label>
                                                    <input id="name"  type="text" name="seller_name" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="mobile">Mobile</label>
                                                    <input id="mobile" type="text" name="seller_mobile" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email">Email</label>
                                                    <input id="email" type="email" name="seller_email" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password">Password</label>
                                                    <input id="password"  type="password" name="seller_password" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                {{-- <div class="mb-3">
                                                    <label class="control-label">Category</label>
                                                    <select class="form-control select2">
                                                        <option>Select</option>
                                                        <option value="FA">Fashion</option>
                                                        <option value="EL">Electronic</option>
                                                    </select>
                                                </div> --}}
                                                {{-- <div class="mb-3">
                                                    <label class="control-label">Features</label>

                                                    <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
                                                        <option value="WI">Wireless</option>
                                                        <option value="BE">Battery life</option>
                                                        <option value="BA">Bass</option>
                                                    </select>

                                                </div> --}}
                                                <div class="mb-3">
                                                    <label for="city">City</label>
                                                    <input id="city" type="text" name="seller_city" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="state">State</label>
                                                    <input id="state"  type="text" name="seller_state" class="form-control">
                                                </div>
                                                {{-- <div class="mb-3">
                                                    <label for="country">Country</label>
                                                    <input id="country"  type="text" name="seller_country" class="form-control">
                                                </div> --}}

                                                <div class="mb-3">
                                                    <label for="seller_country" class="form-label"> Country</label>
                                                    {{-- <input type="text" class="form-control" id="shop_country"
                                                        placeholder="Enter Shop Country" name="shop_country"
                                                        value="{{ $sellerDetail['shop_country'] }}"> --}}

                                                        <select name="seller_country" id="seller_country" class="form-control">
                                                            <option value="">Select Country</option>
                                                            @foreach ($countries as $country )
                                                                <option value="{{ $country['country_name'] }}" >{{ $country['country_name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="pincode">Pincode</label>
                                                    <input id="pincode"  type="text" name="seller_pincode" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="address">Address</label>
                                                    <textarea class="form-control" id="address" name="seller_address" rows="3"></textarea>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Register</button>
                                            <button type="reset" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                        </div>


                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Image</h4>

                                    <div class="dropzone">
                                        <div class="fallback">
                                            <input name="seller_image" type="file" multiple />
                                        </div>

                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                            </div>

                                            <h4>Drop files here or click to upload.</h4>
                                        </div>
                                    </div>
                                </form>
                                </div>

                            </div> <!-- end card-->

                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
        {{-- </div> --}}
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

