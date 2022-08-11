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
                                            <h5 class="text-primary text-center font-size-18">Tell us about your bussiness</h5>
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

                                    <h4 class="card-title">Business Detail</h4>
                                    <p class="card-title-desc">Fill all information below</p>

                                    <form class="form-horizontal"
                                        action="{{ url('admin/seller-bussiness') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                {{-- <div class="mb-3">
                                                    <label class="form-label"> Email</label>
                                                    <input class="form-control" name="email">
                                                </div> --}}

                                                <div class="mb-3">
                                                    <label for="shop_name" class="form-label">Shop Name</label>
                                                    <input type="text" class="form-control" id="shop_name" placeholder="Enter Shop name"
                                                        name="shop_name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="shop_mobile" class="form-label">Shop Mobile</label>
                                                    <input type="text" class="form-control" maxlength="10"
                                                        minlength="10" id="shop_mobile" name="shop_mobile"
                                                        placeholder="Enter shop Mobile">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="shop_category" class="form-label">Select Shop Category</label>
                                                    <select name="shop_category" id="shop_category" class="form-select">
                                                        <option value="">select</option>
                                                        @foreach ($categories as $item)
                                                            <option value="{{ $item['id'] }}">{{ $item['category_name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="mb-3">
                                                    <label for="business_license_number" class="form-label">Business
                                                        License Number</label>
                                                    <input type="text" class="form-control" id="business_license_number"
                                                        name="business_license_number"
                                                        placeholder="Enter Business License Number">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="gst_number" class="form-label">GST Number</label>
                                                    <input type="text" class="form-control" id="gst_number" name="gst_number"
                                                        placeholder="Enter GST Number">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pan_number" class="form-label">Pan Number</label>
                                                    <input type="text" class="form-control" id="pan_number" name="pan_number"
                                                        placeholder="Enter PAN Number">
                                                </div>
                                                {{-- <div class="mb-3">
                                                    <label for="shop_email" class="form-label">Shop Email</label>
                                                    <input type="email" class="form-control" id="shop_email" name="shop_email"
                                                        placeholder="Enter Shop Email"
                                                        value="{{ $shopDetail['shop_email'] }}">
                                                </div> --}}


                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="shop_city" class="form-label">Shop City</label>
                                                    <input type="text" class="form-control" id="shop_city"
                                                        name="shop_city" placeholder="Enter Shop City">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="shop_state" class="form-label">Shop State</label>
                                                    <input type="text" class="form-control" id="shop_state"
                                                        name="shop_state" placeholder="Enter Shop State">
                                                </div>
                                                {{-- <div class="mb-3">
                                                    <label for="shop_country" class="form-label">Shop Country</label>

                                                        <select name="shop_country" id="shop_country" class="form-control">
                                                            <option value="">Select Country</option>
                                                            @foreach ($countries as $country )
                                                                <option value="{{ $country['country_name'] }}" >{{ $country['country_name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                </div> --}}
                                                <div class="mb-3">
                                                    <label for="shop_pincode" class="form-label">Shop Pincode</label>
                                                    <input type="text" class="form-control" id="shop_pincode"
                                                        placeholder="Enter Shop Pincode" name="shop_pincode">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="shop_address" class="form-label">Shop Address</label>
                                                    <textarea name="shop_address" id="shop_address" cols="10" rows="3" class="form-control"
                                                        placeholder="Enter Shop Address"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="shop_website" class="form-label">Shop Website</label>
                                                    <input type="url" class="form-control" id="shop_website" name="shop_website"
                                                        placeholder="Enter Shop Website">
                                                </div>


                                                <div class="mb-3">
                                                    <label for="address_proof" class="form-label">Address Proof</label>
                                                    <select class="form-control" name="address_proof" id="address_proof">
                                                        <option value="Passport"         >Passport</option>
                                                        <option value="Voting Card"     >Voting Card</option>
                                                        <option value="PAN"             >PAN</option>
                                                        <option value="Driving License" >Driving License</option>
                                                        <option value="Aadhar Card"     >Aadhar Card</option>

                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="address_proof_image" class="form-label">Address Proof
                                                        Image </label>
                                                    <input type="file" class="form-control" id="address_proof_image"
                                                        name="address_proof_image">
                                                </div>

                                                {{-- @if (!empty($sellerDetail['address_proof_image']))
                                                    <a target="_blank"
                                                        href="{{ url('admin/images/proof/'.$sellerDetail['address_proof_image']) }}">View
                                                        Image</a>
                                                    <input type="hidden" name="current_addressProof_image"
                                                        value="{{ $sellerDetail['address_proof_image'] }}">
                                                @endif --}}

                                            </div>
                                            <div class="text-end mt-5">
                                                <button class="btn btn-primary w-md waves-effect waves-light"type="submit">Save</button>
                                                <button class="btn btn-secondary w-md waves-effect waves-light mx-2" type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
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

