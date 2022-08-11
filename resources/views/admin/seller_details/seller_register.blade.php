{{-- Final registration form --}}
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')Virtual Shop| Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="{{ asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="{{ asset('admin/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
</head>

<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">

    <div class="row justify-content-center mt-0">
          <div class="col-lg-12 mt-4 px-2">
                    <div class="text-sm-end mb-3 px-2">
                        <a href="{{ route('admin/login') }}">   <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light mx-2">Login</button>  </a>
                        <a href="{{ url('/') }}">   <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="bx bx-arrow-back me-1"></i> Back</button>  </a>

                    </div>
                </div>
        <div class="col-11 col-sm-9 col-md-7 col-lg-9 text-center p-0 mt-3 mb-2">
            @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session::get('error_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif @if (Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session::get('success_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Sign Up Your Seller Account</strong></h2>
                    <p>Fill all form field to go to next step</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">

                            <form id="msform" method="POST" action="{{ url('admin/seller-registration') }}"
                                enctype="multipart/form-data">
                                @csrf


                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="personal"><strong>Personal Information</strong></li>
                                    <li id="bussiness"><strong>Business Information </strong></li>
                                    <li id="bank"><strong>Bank Information</strong></li>
                                    <li id="plan"><strong>Plan</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        {{-- <h2 class="fs-title">Account Information</h2>
                                    <input type="email" name="email" placeholder="Email Id"/>
                                    <input type="text" name="uname" placeholder="UserName"/>
                                    <input type="password" name="pwd" placeholder="Password"/>
                                    <input type="password" name="cpwd" placeholder="Confirm Password"/> --}}

                                        <h2 class="fs-title">Personal Information</h2><br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="name">Name</label>
                                                    <input id="name" type="text" name="seller_name"
                                                        class="form-control" placeholder="Enter Name"
                                                        value="{{ old('seller_name') }}">

                                                    @if ($errors->has('seller_name'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('seller_name') }}</span>
                                                    @endif

                                                </div>
                                                <div class="mb-3">
                                                    <label for="seller_mobile">Mobile</label>
                                                    <input id="seller_mobile" type="text" name="seller_mobile"
                                                        class="form-control" placeholder="Enter Mobile"
                                                        value="{{ old('seller_mobile') }}">
                                                    @if ($errors->has('seller_mobile'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('seller_mobile') }}</span>
                                                    @endif

                                                </div>
                                                <div class="mb-3">
                                                    <label for="seller_email">Email</label>
                                                    <input id="seller_email" type="email" name="seller_email"
                                                        class="form-control" placeholder="Enter Email"
                                                        autocomplete="off" value="{{ old('seller_email') }}">

                                                    @if ($errors->has('seller_email'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('seller_email') }}</span>
                                                    @endif

                                                </div>
                                                <div class="mb-3">
                                                    <label for="seller_password">Password</label>
                                                    <input id="seller_password" type="password"
                                                        name="seller_password" class="form-control"
                                                        placeholder="Enter Password" autocomplete="off"
                                                        value="{{ old('seller_password') }}">


                                                    @if ($errors->has('seller_password'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('seller_password') }}</span>
                                                    @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="seller_image" class="form-label">Image </label>
                                                    <input type="file" class="form-control" id="seller_image"
                                                        name="seller_image" value="{{ old('seller_image') }}">

                                                    @if ($errors->has('seller_image'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('seller_image') }}</span>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="seller_city">City</label>
                                                    <input id="seller_city" type="text" name="seller_city"
                                                        class="form-control" placeholder="Enter City"
                                                        value="{{ old('seller_city') }}">
                                                    @if ($errors->has('seller_city'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('seller_city') }}</span>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="seller_state">State</label>
                                                    <input id="state" type="text" name="seller_state"
                                                        class="form-control" placeholder="Enter State"
                                                        value="{{ old('seller_state') }}">

                                                    @if ($errors->has('seller_state'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('seller_state') }}</span>
                                                    @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="seller_country" class="form-label"> Country</label>

                                                    <select name="seller_country" id="seller_country"
                                                        class="form-select">
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country['country_name'] }}">
                                                                {{ $country['country_name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('seller_country'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('seller_country') }}</span>
                                                    @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="seller_pincode">Pincode</label>
                                                    <input id="pincode" type="text" name="seller_pincode"
                                                        class="form-control" placeholder="Enter Pincode"
                                                        value="{{ old('seller_pincode') }}">

                                                    @if ($errors->has('seller_pincode'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('seller_pincode') }}</span>
                                                    @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="seller_address">Address</label>
                                                    <textarea class="form-control" id="address" name="seller_address" rows="3" placeholder="Enter Address">{{ old('seller_address') }}</textarea>

                                                    @if ($errors->has('seller_address'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('seller_address') }}</span>
                                                    @endif

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <input type="button" name="next" class="next action-button"
                                        value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Business Information</h2><br>
                                        {{-- <input type="text" name="fname" placeholder="First Name"/>
                                    <input type="text" name="lname" placeholder="Last Name"/>
                                    <input type="text" name="phno" placeholder="Contact No."/>
                                    <input type="text" name="phno_2" placeholder="Alternate Contact No."/> --}}
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="shop_name" class="form-label">Shop Name</label>
                                                    <input type="text" class="form-control" id="shop_name"
                                                        placeholder="Enter Shop name" name="shop_name"
                                                        value="{{ old('shop_name') }}">
                                                    @if ($errors->has('shop_name'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('shop_name') }}</span>
                                                    @endif

                                                </div>
                                                <div class="mb-3">
                                                    <label for="shop_mobile" class="form-label">Shop Mobile</label>
                                                    <input type="text" class="form-control" maxlength="10"
                                                        minlength="10" id="shop_mobile" name="shop_mobile"
                                                        placeholder="Enter shop Mobile"
                                                        value="{{ old('shop_mobile') }}">

                                                    @if ($errors->has('shop_mobile'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('shop_mobile') }}</span>
                                                    @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="shop_category" class="form-label">Select Shop
                                                        Category</label>
                                                    <select name="shop_category" id="shop_category"
                                                        class="form-select">
                                                        <option value="">select</option>
                                                        @foreach ($categories as $item)
                                                            <option value="{{ $item['id'] }}">
                                                                {{ $item['category_name'] }}</option>
                                                        @endforeach
                                                    </select>

                                                    @if ($errors->has('shop_category'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('shop_category') }}</span>
                                                    @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="address_proof" class="form-label">Address
                                                        Proof</label>
                                                    <select class="form-select" name="address_proof"
                                                        id="address_proof">
                                                        <option value="">select</option>
                                                        <option value="Passport"
                                                            {{ old('address_proof') == 'Passport' ? 'selected' : '' }}>
                                                            Passport</option>
                                                        <option value="Voting Card"
                                                            {{ old('address_proof') == 'Voting Card' ? 'selected' : '' }}>
                                                            Voting Card
                                                        </option>
                                                        <option value="PAN"
                                                            {{ old('address_proof') == 'PAN' ? 'selected' : '' }}>PAN
                                                        </option>
                                                        <option value="Driving License"
                                                            {{ old('address_proof') == 'Driving License' ? 'selected' : '' }}>
                                                            Driving
                                                            License</option>
                                                        <option value="Aadhar Card"
                                                            {{ old('address_proof') == 'Aadhar Card' ? 'selected' : '' }}>
                                                            Aadhar Card
                                                        </option>

                                                    </select>

                                                    @if ($errors->has('address_proof'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('address_proof') }}</span>
                                                    @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="address_proof_image" class="form-label">Address Proof
                                                        Image </label>
                                                    <input type="file" class="form-control"
                                                        id="address_proof_image" name="address_proof_image"
                                                        {{ old('address_proof_image') }}>
                                                    @if ($errors->has('address_proof_image'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('address_proof_image') }}</span>
                                                    @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="shop_banner" class="form-label">Shop Banner </label>

                                                    <input type="file" class="form-control" id="shop_banner"
                                                        name="shop_banner" {{ old('shop_banner') }}>
                                                    @if ($errors->has('shop_banner'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('shop_banner') }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="shop_city" class="form-label">Shop City</label>
                                                    <input type="text" class="form-control" id="shop_city"
                                                        name="shop_city" placeholder="Enter Shop City"
                                                        value="{{ old('shop_city') }}">
                                                    @if ($errors->has('shop_city'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('shop_city') }}</span>
                                                    @endif

                                                </div>
                                                <div class="mb-3">
                                                    <label for="shop_state" class="form-label">Shop State</label>
                                                    <input type="text" class="form-control" id="shop_state"
                                                        name="shop_state" placeholder="Enter Shop State"
                                                        value="{{ old('shop_state') }}">
                                                    @if ($errors->has('shop_state'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('shop_state') }}</span>
                                                    @endif

                                                </div>
                                                <div class="mb-3">
                                                    <label for="shop_country" class="form-label">Shop Country</label>
                                                    <select name="shop_country" id="shop_country"
                                                        class="form-control">
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country['country_name'] }}"
                                                                {{ old('shop_country') == $country ? 'selected' : '' }}>
                                                                {{ $country['country_name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('shop_country'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('shop_country') }}</span>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="shop_pincode" class="form-label">Shop Pincode</label>
                                                    <input type="text" class="form-control" id="shop_pincode"
                                                        placeholder="Enter Shop Pincode" name="shop_pincode"
                                                        value="{{ old('shop_pincode') }}">
                                                    @if ($errors->has('shop_pincode'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('shop_pincode') }}</span>
                                                    @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="shop_address" class="form-label">Shop Address</label>
                                                    <textarea name="shop_address" id="shop_address" cols="10" rows="3" class="form-control"
                                                        placeholder="Enter Shop Address">{{ old('shop_address') }}</textarea>

                                                    @if ($errors->has('shop_address'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('shop_address') }}</span>
                                                    @endif

                                                </div>

                                                <div class="mb-3">
                                                    <label for="shop_logo" class="form-label">Shop Logo</label>

                                                    <input type="file" class="form-control" id="shop_logo"
                                                        name="shop_logo" {{ old('shop_logo') }}>
                                                    @if ($errors->has('shop_logo'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('shop_logo') }}</span>
                                                    @endif

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <input type="button" name="next" class="next action-button"
                                        value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Bank Information</h2><br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="account_holder_name" class="form-label">Account Holder
                                                        Name</label>
                                                    <input type="text" class="form-control"
                                                        id="account_holder_name" name="account_holder_name"
                                                        placeholder="Enter Account  Holder Name"
                                                        value="{{ old('account_holder_name') }}">
                                                    @if ($errors->has('account_holder_name'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('account_holder_name') }}</span>
                                                    @endif
                                                </div>

                                                <div class="mb-3">
                                                    <label for="bank_name" class="form-label">Bank Name</label>
                                                    <input type="text" class="form-control" id="bank_name"
                                                        name="bank_name" placeholder="Enter Bank Name"
                                                        value="{{ old('bank_name') }}">
                                                    @if ($errors->has('bank_name'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('bank_name') }}</span>
                                                    @endif


                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="account_number" class="form-label">Account Number
                                                        License Number</label>
                                                    <input type="text" class="form-control" id="account_number"
                                                        name="account_number" placeholder="Enter Account Number"
                                                        value="{{ old('account_number') }}">
                                                    @if ($errors->has('account_number'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('account_number') }}</span>
                                                    @endif


                                                </div>

                                                <div class="mb-3">
                                                    <label for="bank_ifsc_code" class="form-label">Bank IFSC
                                                        Code</label>
                                                    <input type="text" class="form-control" id="bank_ifsc_code"
                                                        name="bank_ifsc_code" placeholder="Enter IFSC code"
                                                        value="{{ old('bank_ifsc_code') }}">
                                                    @if ($errors->has('bank_ifsc_code'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('bank_ifsc_code') }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <input type="button" name="make_payment" class="next action-button"
                                        value="Confirm" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        {{-- <h2 class="fs-title text-center">Success !</h2>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>You Have Successfully Signed Up</h5>
                                        </div>
                                    </div> --}}

                                        <div id="generic_price_table">
                                            <section>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <!--PRICE HEADING START-->
                                                            <div class="price-heading clearfix">
                                                                <h1>Choose a Plan</h1>
                                                            </div>
                                                            <!--//PRICE HEADING END-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container">

                                                    <!--BLOCK ROW START-->
                                                    <div class="row">
                                                        <div class="col-md-4">

                                                            <!--PRICE CONTENT START-->
                                                            <div class="generic_content clearfix">

                                                                <!--HEAD PRICE DETAIL START-->
                                                                <div class="generic_head_price clearfix">

                                                                    <!--HEAD CONTENT START-->
                                                                    <div class="generic_head_content clearfix">

                                                                        <!--HEAD START-->
                                                                        <div class="head_bg"></div>
                                                                        <div class="head">
                                                                            <span>Basic</span>
                                                                        </div>
                                                                        <!--//HEAD END-->

                                                                    </div>
                                                                    <!--//HEAD CONTENT END-->

                                                                    <!--PRICE START-->
                                                                    <div class="generic_price_tag clearfix">
                                                                        <span class="price">
                                                                            <span class="sign">Rs.</span>
                                                                            <span class="currency">99</span>
                                                                            <span class="cent">.99</span>
                                                                            <span class="month">/MON</span>
                                                                        </span>
                                                                    </div>
                                                                    <!--//PRICE END-->

                                                                </div>
                                                                <!--//HEAD PRICE DETAIL END-->

                                                                <!--FEATURE LIST START-->
                                                                <div class="generic_feature_list">
                                                                    <ul>
                                                                        <li> Add Upto <span>4 Products</span> </li>
                                                                        {{-- <li><span>150GB</span> Storage</li>
                                                                        <li><span>12</span> Accounts</li>
                                                                        <li><span>7</span> Host Domain</li>
                                                                        <li><span>24/7</span> Support</li> --}}
                                                                    </ul>
                                                                </div>
                                                                <!--//FEATURE LIST END-->

                                                                <!--BUTTON START-->
                                                                <div class="generic_price_btn clearfix">
                                                                    <button type="submit" name="plan_a"
                                                                        value="plan_a" class="btn btn-primary">Get
                                                                        Started</button>
                                                                    {{-- <button type="submit" name="plan" value="plan_a">Get Started</button> --}}
                                                                </div>
                                                                <!--//BUTTON END-->

                                                            </div>
                                                            <!--//PRICE CONTENT END-->

                                                        </div>

                                                        <div class="col-md-4">

                                                            <!--PRICE CONTENT START-->
                                                            <div class="generic_content active clearfix">

                                                                <!--HEAD PRICE DETAIL START-->
                                                                <div class="generic_head_price clearfix">

                                                                    <!--HEAD CONTENT START-->
                                                                    <div class="generic_head_content clearfix">

                                                                        <!--HEAD START-->
                                                                        <div class="head_bg"></div>
                                                                        <div class="head">
                                                                            <span>Standard</span>
                                                                        </div>
                                                                        <!--//HEAD END-->

                                                                    </div>
                                                                    <!--//HEAD CONTENT END-->

                                                                    <!--PRICE START-->
                                                                    <div class="generic_price_tag clearfix">
                                                                        <span class="price">
                                                                            <span class="sign">Rs.</span>
                                                                            <span class="currency">199</span>
                                                                            <span class="cent">.99</span>
                                                                            <span class="month">/MON</span>
                                                                        </span>
                                                                    </div>
                                                                    <!--//PRICE END-->

                                                                </div>
                                                                <!--//HEAD PRICE DETAIL END-->

                                                                <!--FEATURE LIST START-->
                                                                <div class="generic_feature_list">
                                                                    <ul>
                                                                        <li> Add Upto <span>8 Products</span> </li>
                                                                        {{-- <li><span>150GB</span> Storage</li>
                                                                        <li><span>12</span> Accounts</li>
                                                                        <li><span>7</span> Host Domain</li>
                                                                        <li><span>24/7</span> Support</li> --}}
                                                                    </ul>
                                                                </div>
                                                                <!--//FEATURE LIST END-->

                                                                <!--BUTTON START-->
                                                                <div class="generic_price_btn clearfix">
                                                                    <button type="submit" name="plan_b"
                                                                        value="plan_b" class="btn btn-primary">Get
                                                                        Started</button>
                                                                    {{-- <button type="submit" name="plan" value="plan_b">Get Started</button> --}}
                                                                </div>
                                                                <!--//BUTTON END-->

                                                            </div>
                                                            <!--//PRICE CONTENT END-->

                                                        </div>
                                                        <div class="col-md-4">

                                                            <!--PRICE CONTENT START-->
                                                            <div class="generic_content clearfix">

                                                                <!--HEAD PRICE DETAIL START-->
                                                                <div class="generic_head_price clearfix">

                                                                    <!--HEAD CONTENT START-->
                                                                    <div class="generic_head_content clearfix">

                                                                        <!--HEAD START-->
                                                                        <div class="head_bg"></div>
                                                                        <div class="head">
                                                                            <span>Unlimited</span>
                                                                        </div>
                                                                        <!--//HEAD END-->

                                                                    </div>
                                                                    <!--//HEAD CONTENT END-->

                                                                    <!--PRICE START-->
                                                                    <div class="generic_price_tag clearfix">
                                                                        <span class="price">
                                                                            <span class="sign">Rs.</span>
                                                                            <span class="currency">299</span>
                                                                            <span class="cent">.99</span>
                                                                            <span class="month">/MON</span>
                                                                        </span>
                                                                    </div>
                                                                    <!--//PRICE END-->

                                                                </div>
                                                                <!--//HEAD PRICE DETAIL END-->

                                                                <!--FEATURE LIST START-->
                                                                <div class="generic_feature_list">
                                                                    <ul>
                                                                        <li> Add Upto <span>12 Products</span> </li>
                                                                        {{-- <li><span>150GB</span> Storage</li>
                                                                        <li><span>12</span> Accounts</li>
                                                                        <li><span>7</span> Host Domain</li>
                                                                        <li><span>24/7</span> Support</li> --}}
                                                                    </ul>
                                                                </div>
                                                                <!--//FEATURE LIST END-->

                                                                <!--BUTTON START-->
                                                                <div class="generic_price_btn clearfix">
                                                                    <button type="submit" name="plan_c"
                                                                        value="plan_c" class="btn btn-primary">Get
                                                                        Started</button>
                                                                    {{-- <button type="submit" name="plan" value="plan_c">Get Started</button> --}}
                                                                </div>
                                                                <!--//BUTTON END-->

                                                            </div>
                                                            <!--//PRICE CONTENT END-->

                                                        </div>
                                                    </div>
                                                    <!--//BLOCK ROW END-->

                                                </div>
                                            </section>
                                            <footer>
                                                {{-- <a class="bottom_btn" href="#">&copy; MrSahar</a> --}}
                                            </footer>
                                        </div>
                                    </div>
                                </fieldset>

                            </form>
                            <div class="mt-5 text-center">
                                <div>
                                    <p>Already have an account ? <a href="{{ route('admin/login') }}"
                                            class="fw-medium text-primary">
                                            Login</a> </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> --}}
<!-- JAVASCRIPT -->
<script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    $(document).ready(function() {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $(".next").click(function() {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });

        $(".previous").click(function() {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });

        $(".submit").click(function() {
            return false;
        })

    });
</script>
</body>

</html>
