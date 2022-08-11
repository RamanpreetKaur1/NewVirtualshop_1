@extends('admin.layout.layout')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session::get('success_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> @endif
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Seller Details</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Seller Details</li>
                                </ol>
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

                                <form method="POST" action="{{ url('admin/seller_view/'.$seller_view->id )}}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Email</label>
                                                <input class="form-control" name="seller_email" value="{{ $seller_view->seller_email }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_name" class="form-label"> Name</label>
                                                <input class="form-control" id="seller_name"
                                                    name="seller_name"  value="{{ $seller_view->seller_name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_mobile" class="form-label">Mobile</label>
                                                <input class="form-control" maxlength="10" minlength="10"
                                                    id="seller_mobile" name="seller_mobile" placeholder="Enter Mobile"  value="{{ $seller_view->seller_mobile }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_address" class="form-label"> Address</label>
                                                <textarea name="seller_address" id="seller_address" cols="10" rows="4" class="form-control">{{ $seller_view->seller_address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="seller_city" class="form-label"> City</label>
                                                <input class="form-control" id="seller_city"
                                                    name="seller_city"  value="{{ $seller_view->seller_city}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_state" class="form-label"> State</label>
                                                <input class="form-control" id="seller_state"
                                                    name="seller_state"  value="{{ $seller_view->seller_state }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_country" class="form-label"> Country</label>

                                                    <select name="seller_country" id="seller_country" class="form-select">
                                                        <option value="">Select Country</option>
                                                        {{-- @foreach ($countries as $country )
                                                            <option value="{{ $country['country_name'] }}" >{{ $country['country_name'] }}</option>
                                                        @endforeach --}}
                                                        @foreach ($countries as $country)
                                                        <option value="{{ $country['id'] }}"
                                                        @if (!empty($seller_view['seller_country']) && $seller_view['seller_country'] == $country['id']) selected =""  @endif>{{  $country['country_name'] }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_pincode" class="form-label"> Pincode</label>
                                                <input class="form-control" id="seller_pincode"
                                                    name="seller_pincode"  value="{{ $seller_view->seller_pincode }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="seller_image" class="form-label">Image </label>
                                                <input type="file" class="form-control" id="seller_image"
                                                    name="seller_image"  value="{{ $seller_view->seller_image }}">
                                                    <input type="hidden" name="current_seller_image"
                                                    value="{{ $seller_view->seller_image }}">
                                            </div>


                                        </div>
                                        @if (!empty($seller_view->seller_image))
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-3"></h4>

                                                       <img src="{{ url('admin/images/photos/'.$seller_view->seller_image) }}" alt="" width="200px">
                                            </div>
                                        </div>
                                        @endif
                                        {{-- <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-3">Image</h4>
                                                <div class="fallback">
                                                    <input name="seller_image" type="file" multiple  /> </div>
                                                    @if (!empty($seller_view['seller_image']))
                                                <div class="dz-message needsclick text-center"> <img src="{{ url('admin/images/photos/'.$seller_view->seller_image) }}" alt="Seller Image" width="400px;" height="400px"> </div>
                                                <div class="text-sm-end">
                                                    <a href="javascript:void(0)" module="seller-image" moduleid="{{ $seller_view['id'] }}" class="text-danger confirmDelete">
                                                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light"><i class="far fa-trash-alt me-1"></i> Delete Image</button>
                                                    </a>
                                                </div> @else
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3"> <i class="display-4 text-muted bx bxs-cloud-upload"></i> </div>
                                                    <h4>Drop files here or click to upload.</h4> </div> @endif </div>
                                        </div> --}}

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Business Information</h4>
                                {{-- <p class="card-title-desc">Fill all information below</p> --}}
                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="mb-3">
                                                <label for="shop_name" class="form-label">Shop Name</label>
                                                <input class="form-control" id="shop_name"
                                                    name="shop_name" value="{{ $seller_view->shop_name }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="shop_mobile" class="form-label">Shop Mobile</label>
                                                <input  class="form-control" maxlength="10" minlength="10"
                                                    id="shop_mobile" name="shop_mobile" value="{{ $seller_view->shop_mobile }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="shop_address" class="form-label">Shop Address</label>
                                                <textarea name="shop_address" id="shop_address" cols="10" rows="4" class="form-control">{{ $seller_view->shop_address }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="shop_pincode" class="form-label">Shop Pincode</label>
                                                <input  class="form-control" id="shop_pincode"
                                                    name="shop_pincode" value="{{ $seller_view->shop_pincode }}">
                                            </div>


                                            <div class="mb-3">
                                                <label for="shop_category" class="form-label">Select Shop Category</label>
                                                <select name="shop_category" id="shop_category" class="form-select">
                                                    <option value="">select</option>
                                                    @foreach ($categories as $item)
                                                    <option value="{{ $item['id'] }}"
                                                    @if (!empty($seller_view['shop_category']) && $seller_view['shop_category'] == $item['id']) selected =""  @endif>{{ $item['category_name'] }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="address_proof" class="form-label">Address Proof</label>
                                                <select class="form-select" name="address_proof" id="address_proof">
                                                    <option value="">select</option>
                                                    <option value="Passport"  {{ $seller_view->address_proof == 'Passport' ? 'selected' : '' }}>Passport</option>
                                                    <option value="Voting Card"   {{ $seller_view->address_proof == 'Voting Card' ? 'selected' : '' }}>Voting Card</option>
                                                    <option value="PAN"         {{ $seller_view->address_proof == 'PAN' ? 'selected' : '' }}    >PAN</option>
                                                    <option value="Driving License"  {{ $seller_view->address_proof == 'Driving License' ? 'selected' : '' }}>Driving License</option>
                                                    <option value="Aadhar Card"     {{ $seller_view->address_proof == 'Aadhar Card' ? 'selected' : '' }}>Aadhar Card</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="address_proof_image" class="form-label">Address Proof Image </label>
                                                <input type="file" class="form-control" id="address_proof_image"
                                                    name="address_proof_image" value="{{ $seller_view->address_proof_image }}">
                                                    <input type="hidden" name="current_address_proof_image"
                                                    value="{{ $seller_view->address_proof_image }}">
                                            </div>
                                            <label for="address_proof_image" class="form-label">Address Proof Image</label>
                                            @if (!empty($seller_view->address_proof_image))
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title mb-3"></h4>
                                                        <img src="{{ url('admin/images/proof/'.$seller_view->address_proof_image) }}" alt="" width="200px">
                                                    </div>

                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="shop_city" class="form-label">Shop City</label>
                                                <input  class="form-control" id="shop_city"
                                                    name="shop_city" value="{{ $seller_view->shop_city }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="shop_state" class="form-label">Shop State</label>
                                                <input  class="form-control" id="shop_state"
                                                    name="shop_state" value="{{ $seller_view->shop_state }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="shop_country" class="form-label">Select Shop Country</label>
                                                <select name="shop_country" id="shop_country" class="form-select">
                                                    <option value="">select</option>
                                                    @foreach ($countries as $country)
                                                    <option value="{{ $country['id'] }}"
                                                    @if (!empty($seller_view['shop_country']) && $seller_view['shop_country'] == $country['id']) selected =""  @endif>{{ $country['country_name'] }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="shop_banner" class="form-label">Shop Banner </label>
                                                <input type="file" class="form-control" id="shop_banner"
                                                    name="shop_banner" value="{{ $seller_view->shop_banner }}">
                                                    <input type="hidden" name="current_shop_banner"
                                                    value="{{ $seller_view->shop_banner }}">
                                            </div>

                                            <label for="shop_banner" class="form-label">Shop Banner </label>
                                        @if (!empty($seller_view->shop_banner))
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title"></h4>
                                                    <img src="{{ url('admin/images/shop_banners/'.$seller_view->shop_banner) }}" alt="shop banner" width="200px" height="200px">
                                                </div>
                                            </div>
                                        @endif

                                        <div class="mb-3">
                                            <label for="shop_logo" class="form-label">Shop Logo </label>
                                            <input type="file" class="form-control" id="shop_logo"
                                                name="shop_logo" value="{{ $seller_view->shop_logo }}">
                                                <input type="hidden" name="current_shop_logo"
                                                value="{{ $seller_view->shop_logo }}">
                                        </div>

                                        <label for="shop_logo" class="form-label">Shop Logo</label>
                                    @if (!empty($seller_view->shop_logo))
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title"></h4>
                                                <img src="{{ url('admin/images/shop_logo/'.$seller_view->shop_logo) }}" alt="Shop logo" width="200px" height="200px">
                                            </div>
                                        </div>
                                    @endif
                                        </div>



                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bank Informtion</h4>
                                {{-- <p class="card-title-desc">Fill all information below</p> --}}
                                    <div class="row">
                                        <div class="col-sm-6">


                                            <div class="mb-3">
                                                <label for="account_holder_name" class="form-label"> Account Holder Name</label>
                                                <input class="form-control" id="account_holder_name"
                                                    name="account_holder_name" value="{{ $seller_view->account_holder_name }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="bank_name" class="form-label"> Bank Name</label>
                                                <input class="form-control" id="bank_name"
                                                    name="bank_name" value="{{ $seller_view->bank_name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">


                                            <div class="mb-3">
                                                <label for="account_number" class="form-label">Account Number</label>
                                                <input class="form-control" id="account_number"
                                                    name="account_number" value="{{ $seller_view->account_number }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="bank_ifsc_code" class="form-label">Bank  IFSC Code</label>
                                                <input class="form-control" id="bank_ifsc_code"
                                                    name="bank_ifsc_code" value="{{ $seller_view->bank_ifsc_code }}">
                                            </div>

                                            {{-- <div class="mb-3">
                                                <label for="plan_name" class="form-label">Plan Name</label>
                                                <input class="form-control" id="plan_name"
                                                    name="plan_name" value="{{ $seller_plan_view->plan_name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="plan_value" class="form-label">Plan Price</label>
                                                <input class="form-control" id="plan_value"
                                                    name="plan_value" value="{{ $seller_plan_view->plan_value }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="plan_limit" class="form-label">Limits To add product</label>
                                                <input class="form-control" id="plan_limit"
                                                    name="plan_limit" value="{{ $seller_plan_view->plan_limit }}">
                                            </div> --}}

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Plan Details</h4>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="plan_name" class="form-label">Plan Name</label>
                                                <input class="form-control" id="plan_name"
                                                    name="plan_name" value="{{ $seller_plan_view->plan_name }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="plan_value" class="form-label">Plan Price</label>
                                                <input class="form-control" id="plan_value"
                                                    name="plan_value" value="{{ $seller_plan_view->plan_value }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">

                                            <div class="mb-3">
                                                <label for="plan_limit" class="form-label">Limits To add product</label>
                                                <input class="form-control" id="plan_limit"
                                                    name="plan_limit" value="{{ $seller_plan_view->plan_limit }}" readonly>
                                            </div>



                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="d-flex flex-wrap gap-2">
                <button type="submit" class="btn btn-primary w-md waves-effect waves-light">Update</button>
                <button class="btn btn-secondary w-md waves-effect waves-light mx-2" type="reset">Cancel</button>
            </div>
        </form>
        </div>

    </div>

            </div>
            </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
