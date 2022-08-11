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

                                <form  action="" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Email</label>
                                                <input class="form-control" name="seller_email" value="{{ $seller_view->seller_email }}" readonly>

                                            </div>

                                            <div class="mb-3">
                                                <label for="seller_name" class="form-label"> Name</label>
                                                <input class="form-control" id="seller_name"
                                                    name="seller_name"  value="{{ $seller_view->seller_name }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="seller_mobile" class="form-label">Mobile</label>
                                                <input class="form-control" maxlength="10" minlength="10"
                                                    id="seller_mobile" name="seller_mobile" placeholder="Enter Mobile"  value="{{ $seller_view->seller_mobile }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_address" class="form-label"> Address</label>
                                                <textarea name="seller_address" id="seller_address" cols="10" rows="4" class="form-control" readonly>{{ $seller_view->seller_address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="seller_city" class="form-label"> City</label>
                                                <input class="form-control" id="seller_city"
                                                    name="seller_city"  value="{{ $seller_view->seller_city}}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_state" class="form-label"> State</label>
                                                <input class="form-control" id="seller_state"
                                                    name="seller_state"  value="{{ $seller_view->seller_state }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_country" class="form-label"> Country</label>
                                                <input type="text" class="form-control" value="{{ $seller_view->seller_country }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="seller_pincode" class="form-label"> Pincode</label>
                                                <input class="form-control" id="seller_pincode"
                                                    name="seller_pincode"  value="{{ $seller_view->seller_pincode }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="seller_image" class="form-label">Image </label>
                                                <input type="file" class="form-control" id="seller_image"
                                                    name="seller_image"  value="{{ $seller_view->seller_image }}" readonly>
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

                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="mb-3">
                                                <label for="shop_name" class="form-label">Shop Name</label>
                                                <input class="form-control" id="shop_name"
                                                    name="shop_name" value="{{ $seller_view->shop_name }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="shop_mobile" class="form-label">Shop Mobile</label>
                                                <input  class="form-control" maxlength="10" minlength="10"
                                                    id="shop_mobile" name="shop_mobile" value="{{ $seller_view->shop_mobile }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="shop_address" class="form-label">Shop Address</label>
                                                <textarea name="shop_address" id="shop_address" cols="10" rows="4" class="form-control" readonly>{{ $seller_view->shop_address }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="shop_pincode" class="form-label">Shop Pincode</label>
                                                <input  class="form-control" id="shop_pincode"
                                                    name="shop_pincode" value="{{ $seller_view->shop_pincode }}" readonly>
                                            </div>


                                            <div class="mb-3">
                                                <label for="shop_category" class="form-label">Select Shop Category</label>
                                               {{-- <input type="text" class="form-control" name="" id="" value="{{ $seller_view->shop_category }}" readonly> --}}
                                               <input type="text" class="form-control" name="" id=""
                                               @foreach ($categories as $category)
                                                   @if ($seller_view->shop_category ==  $category['id'])

                                                   @endif
                                               @endforeach value="{{ $category['category_name'] }}" readonly>

                                         </div>

                                            <div class="mb-3">
                                                <label for="address_proof" class="form-label">Address Proof</label>
                                                <input type="text" class="form-control" value="{{ $seller_view->address_proof }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="address_proof_image" class="form-label">Address Proof Image </label>
                                                <input type="file" class="form-control" id="address_proof_image"
                                                    name="address_proof_image" value="{{ $seller_view->address_proof_image }}" readonly>
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
                                                    name="shop_city" value="{{ $seller_view->shop_city }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="shop_state" class="form-label">Shop State</label>
                                                <input  class="form-control" id="shop_state"
                                                    name="shop_state" value="{{ $seller_view->shop_state }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="shop_country" class="form-label">Select Shop Country</label>
                                                <input type="text" class="form-control" value="{{ $seller_view->shop_country }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="shop_banner" class="form-label">Shop Banner </label>
                                                <input type="file" class="form-control" id="shop_banner"
                                                    name="shop_banner" value="{{ $seller_view->shop_banner }}" readonly>
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
                                                name="shop_logo" value="{{ $seller_view->shop_logo }}" readonly>
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

                                    <div class="row">
                                        <div class="col-sm-6">


                                            <div class="mb-3">
                                                <label for="account_holder_name" class="form-label"> Account Holder Name</label>
                                                <input class="form-control" id="account_holder_name"
                                                    name="account_holder_name" value="{{ $seller_view->account_holder_name }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="bank_name" class="form-label"> Bank Name</label>
                                                <input class="form-control" id="bank_name"
                                                    name="bank_name" value="{{ $seller_view->bank_name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">


                                            <div class="mb-3">
                                                <label for="account_number" class="form-label">Account Number</label>
                                                <input class="form-control" id="account_number"
                                                    name="account_number" value="{{ $seller_view->account_number }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="bank_ifsc_code" class="form-label">Bank  IFSC Code</label>
                                                <input class="form-control" id="bank_ifsc_code"
                                                    name="bank_ifsc_code" value="{{ $seller_view->bank_ifsc_code }}" readonly>
                                            </div>



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
