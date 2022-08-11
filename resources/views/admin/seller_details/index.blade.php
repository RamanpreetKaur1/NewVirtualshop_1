<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />


    </head>

    <body>

        {{-- <div class="main-content"> --}}

            <div class="page-content">
                <div class="container">
                    {{-- @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach --}}
                    <!-- start page title -->
                    <div class="row">
                        @if (Session::has('error'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							{{ session::get('error') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert"
								aria-label="Close"></button>
						</div>
						@endif
						@if (Session::has('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session::get('success') }}
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
                                                    <input id="name"  type="text" name="seller_name" class="form-control" placeholder="Enter Name"  value="{{ old('seller_name') }}">

                                                    @if ($errors->has('seller_name'))
                                                     <span class="text-danger">*{{ $errors->first('seller_name') }}</span>
                                                     @endif

                                                </div>
                                                <div class="mb-3">
                                                    <label for="seller_mobile">Mobile</label>
                                                    <input id="seller_mobile" type="text" name="seller_mobile" class="form-control" placeholder="Enter Mobile" value="{{ old('seller_mobile') }}">
                                                    @if ($errors->has('seller_mobile'))
                                                    <span class="text-danger">*{{ $errors->first('seller_mobile') }}</span>
                                                    @endif

                                                </div>
                                                <div class="mb-3">
                                                    <label for="seller_email">Email</label>
                                                    <input id="seller_email" type="email" name="seller_email" class="form-control" placeholder="Enter Email" autocomplete="off" value="{{ old('seller_email') }}">

                                                    @if ($errors->has('seller_email'))
                                                    <span class="text-danger">*{{ $errors->first('seller_email') }}</span>
                                                    @endif

                                                </div>
                                                <div class="mb-3">
                                                    <label for="seller_password">Password</label>
                                                    <input id="seller_password"  type="password" name="seller_password" class="form-control" placeholder="Enter Password" autocomplete="off" value="{{ old('seller_password') }}">


                                                    @if ($errors->has('seller_password'))
                                                    <span class="text-danger">*{{ $errors->first('seller_password') }}</span>
                                                    @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="seller_image" class="form-label">Image </label>
                                                    <input type="file" class="form-control" id="seller_image"
                                                        name="seller_image" value="{{ old('seller_image') }}">

                                                        @if ($errors->has('seller_image'))
                                                        <span class="text-danger">*{{ $errors->first('seller_image') }}</span>
                                                        @endif

                                                    </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="seller_city">City</label>
                                                    <input id="seller_city" type="text" name="seller_city" class="form-control" placeholder="Enter City" value="{{ old('seller_city') }}">
                                                    @if ($errors->has('seller_city'))
                                                    <span class="text-danger">*{{ $errors->first('seller_city') }}</span>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="seller_state">State</label>
                                                    <input id="state"  type="text" name="seller_state" class="form-control" placeholder="Enter State" value="{{ old('seller_state') }}">

                                                    @if ($errors->has('seller_state'))
                                                    <span class="text-danger">*{{ $errors->first('seller_state') }}</span>
                                                    @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="seller_country" class="form-label"> Country</label>

                                                        <select name="seller_country" id="seller_country" class="form-select">
                                                            <option value="">Select Country</option>
                                                            @foreach ($countries as $country )
                                                                <option value="{{ $country['country_name'] }}" >{{ $country['country_name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('seller_country'))
                                                        <span class="text-danger">*{{ $errors->first('seller_country') }}</span>
                                                        @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="seller_pincode">Pincode</label>
                                                    <input id="pincode"  type="text" name="seller_pincode" class="form-control"  placeholder="Enter Pincode" value="{{ old('seller_pincode') }}">

                                                    @if ($errors->has('seller_pincode'))
                                                    <span class="text-danger">*{{ $errors->first('seller_pincode') }}</span>
                                                    @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="seller_address">Address</label>
                                                    <textarea class="form-control" id="address" name="seller_address" rows="3"  placeholder="Enter Address">{{ old('seller_address') }}</textarea>

                                                    @if ($errors->has('seller_address'))
                                                    <span class="text-danger">*{{ $errors->first('seller_address') }}</span>
                                                    @endif

                                                </div>

                                            </div>
                                            <hr>

                                            <h4 class="card-title">Shop Information</h4>
                                            <p class="card-title-desc">Fill all information below</p>


                                            <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="shop_name" class="form-label">Shop Name</label>
                                                <input type="text" class="form-control" id="shop_name" placeholder="Enter Shop name"
                                                    name="shop_name" value="{{ old('shop_name') }}">
                                                    @if ($errors->has('shop_name'))
                                                    <span class="text-danger">*{{ $errors->first('shop_name') }}</span>
                                                    @endif

                                            </div>
                                            <div class="mb-3">
                                                <label for="shop_mobile" class="form-label">Shop Mobile</label>
                                                <input type="text" class="form-control" maxlength="10"
                                                    minlength="10" id="shop_mobile" name="shop_mobile"
                                                    placeholder="Enter shop Mobile" value="{{ old('shop_mobile') }}">

                                                    @if ($errors->has('shop_mobile'))
                                                    <span class="text-danger">*{{ $errors->first('shop_mobile') }}</span>
                                                    @endif

                                            </div>

                                            <div class="mb-3">
                                                <label for="shop_category" class="form-label">Select Shop Category</label>
                                                <select name="shop_category" id="shop_category" class="form-select">
                                                    <option value="">select</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item['id'] }}">{{ $item['category_name'] }}</option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('shop_category'))
                                                <span class="text-danger">*{{ $errors->first('shop_category') }}</span>
                                                @endif

                                            </div>

                                            <div class="mb-3">
                                                <label for="address_proof" class="form-label">Address Proof</label>
                                                <select class="form-select" name="address_proof" id="address_proof">
                                                    <option value="">select</option>
                                                    <option value="Passport"  {{old('address_proof') == 'Passport' ? "selected" : ''}}     >Passport</option>
                                                    <option value="Voting Card"   {{old('address_proof') == 'Voting Card' ? "selected" : ''}}     >Voting Card</option>
                                                    <option value="PAN"            {{old('address_proof') == 'PAN' ? "selected" : ''}}    >PAN</option>
                                                    <option value="Driving License"  {{old('address_proof') == 'Driving License' ? "selected" : ''}}   >Driving License</option>
                                                    <option value="Aadhar Card"     {{old('address_proof') == 'Aadhar Card' ? "selected" : ''}}   >Aadhar Card</option>

                                                </select>

                                                @if ($errors->has('address_proof'))
                                                <span class="text-danger">*{{ $errors->first('address_proof') }}</span>
                                                @endif

                                            </div>

                                            <div class="mb-3">
                                                <label for="address_proof_image" class="form-label">Address Proof
                                                    Image </label>
                                                <input type="file" class="form-control" id="address_proof_image"
                                                    name="address_proof_image" {{ old('address_proof_image') }}>
                                                    @if ($errors->has('address_proof_image'))
                                                    <span class="text-danger">*{{ $errors->first('address_proof_image') }}</span>
                                                    @endif

                                            </div>

                                            <div class="mb-3">
                                                <label for="shop_banner" class="form-label">Shop Banner </label>

                                                <input type="file" class="form-control" id="shop_banner"
                                                    name="shop_banner" {{ old('shop_banner') }}>
                                                    @if ($errors->has('shop_banner'))
                                                    <span class="text-danger">*{{ $errors->first('shop_banner') }}</span>
                                                    @endif

                                            </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="shop_city" class="form-label">Shop City</label>
                                                    <input type="text" class="form-control" id="shop_city"
                                                        name="shop_city" placeholder="Enter Shop City" value="{{ old('shop_city') }}">
                                                        @if ($errors->has('shop_city'))
                                                        <span class="text-danger">*{{ $errors->first('shop_city') }}</span>
                                                        @endif

                                                </div>
                                                <div class="mb-3">
                                                    <label for="shop_state" class="form-label">Shop State</label>
                                                    <input type="text" class="form-control" id="shop_state"
                                                        name="shop_state" placeholder="Enter Shop State" value="{{ old('shop_state') }}">
                                                        @if ($errors->has('shop_state'))
                                                        <span class="text-danger">*{{ $errors->first('shop_state') }}</span>
                                                        @endif

                                                </div>
                                                <div class="mb-3">
                                                    <label for="shop_country" class="form-label">Shop Country</label>
                                                        <select name="shop_country" id="shop_country" class="form-control">
                                                            <option value="">Select Country</option>
                                                            @foreach ($countries as $country )
                                                                <option value="{{ $country['country_name'] }}"  {{ old('shop_country') == $country ?  'selected' : '' }} >{{ $country['country_name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('shop_country'))
                                                        <span class="text-danger">*{{ $errors->first('shop_country') }}</span>
                                                        @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="shop_pincode" class="form-label">Shop Pincode</label>
                                                    <input type="text" class="form-control" id="shop_pincode"
                                                        placeholder="Enter Shop Pincode" name="shop_pincode" value="{{ old('shop_pincode') }}">
                                                        @if ($errors->has('shop_pincode'))
                                                        <span class="text-danger">*{{ $errors->first('shop_pincode') }}</span>
                                                        @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="shop_address" class="form-label">Shop Address</label>
                                                    <textarea name="shop_address" id="shop_address" cols="10" rows="3" class="form-control"
                                                        placeholder="Enter Shop Address">{{ old('shop_address') }}</textarea>

                                                        @if ($errors->has('shop_address'))
                                                        <span class="text-danger">*{{ $errors->first('shop_address') }}</span>
                                                        @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="shop_logo" class="form-label">Shop Logo</label>

                                                    <input type="file" class="form-control" id="shop_logo"
                                                        name="shop_logo" {{ old('shop_logo') }}>
                                                        @if ($errors->has('shop_logo'))
                                                        <span class="text-danger">*{{ $errors->first('shop_logo') }}</span>
                                                        @endif

                                                </div>

                                            </div>
                                            <hr>

                                            <h4 class="card-title">Bank Information</h4>
                                            <p class="card-title-desc">Fill all information below</p>

                                            <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="account_holder_name" class="form-label">Account Holder Name</label>
                                                <input type="text" class="form-control" id="account_holder_name"
                                                    name="account_holder_name" placeholder="Enter Account  Holder Name" value="{{ old('account_holder_name') }}">
                                                    @if ($errors->has('account_holder_name'))
                                                     <span class="text-danger">*{{ $errors->first('account_holder_name') }}</span>
                                                     @endif
                                            </div>

                                            <div class="mb-3">
                                                <label for="bank_name" class="form-label">Bank Name</label>
                                                <input type="text" class="form-control" id="bank_name"
                                                    name="bank_name" placeholder="Enter Bank Name" value="{{ old('bank_name') }}">
                                                    @if ($errors->has('bank_name'))
                                                    <span class="text-danger">*{{ $errors->first('bank_name') }}</span>
                                                    @endif


                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="account_number" class="form-label">Account Number
                                                    License Number</label>
                                                <input type="text" class="form-control" id="account_number" name="account_number"
                                                    placeholder="Enter Account Number" value="{{ old('account_number') }}">
                                                    @if ($errors->has('account_number'))
                                                    <span class="text-danger">*{{ $errors->first('account_number') }}</span>
                                                    @endif


                                            </div>

                                            <div class="mb-3">
                                                <label for="bank_ifsc_code" class="form-label">Bank IFSC Code</label>
                                                <input type="text" class="form-control" id="bank_ifsc_code" name="bank_ifsc_code"
                                                    placeholder="Enter IFSC code" value="{{ old('bank_ifsc_code') }}">
                                                    @if ($errors->has('bank_ifsc_code'))
                                                    <span class="text-danger">*{{ $errors->first('bank_ifsc_code') }}</span>
                                                    @endif

                                            </div>
                                            </div>

                                        </div>
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Register</button>
                                            <button type="reset" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                        </div>

                                    </form>

                                </div>
                            </div>



                            <div class="mt-5 text-center">

                                <div>
                                    <p>Already have an account ? <a href="{{ route('admin/login') }}" class="fw-medium text-primary"> Login</a> </p>
                                    <p>© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                                </div>
                            </div>

                            {{-- <div class="card">
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

                            </div> <!-- end card--> --}}

                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
        {{-- </div> --}}
    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
        <!-- validation init -->
        <script src="{{ asset('admin/assets/js/pages/validation.init.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.validate.js') }}"></script>
        <script src="{{ asset('front/assets/js/front_script.js') }}"></script>
    </body>
</html>

