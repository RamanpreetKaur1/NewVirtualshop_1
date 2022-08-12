@php
// use App\Models\Cart;
use App\Models\Product;
@endphp
@extends('frontend.layout.layout')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Checkout</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Checkout</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="checkout-tabs">

                    <div class="row">
                        <div class="col-xl-2 col-sm-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-shipping-tab" data-bs-toggle="pill"
                                    href="#v-pills-shipping" role="tab" aria-controls="v-pills-shipping"
                                    aria-selected="true">
                                    <i class="bx bxs-truck d-block check-nav-icon mt-4 mb-2"></i>
                                    <p class="font-weight-bold mb-4">Shipping Info</p>
                                </a>
                                <a class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" href="#v-pills-payment"
                                    role="tab" aria-controls="v-pills-payment" aria-selected="false">
                                    <i class="bx bx-money d-block check-nav-icon mt-4 mb-2"></i>
                                    <p class="font-weight-bold mb-4">Payment Info</p>
                                </a>
                                <a class="nav-link" id="v-pills-confir-tab" data-bs-toggle="pill" href="#v-pills-confir"
                                    role="tab" aria-controls="v-pills-confir" aria-selected="false">
                                    <i class="bx bx-badge-check d-block check-nav-icon mt-4 mb-2"></i>
                                    <p class="font-weight-bold mb-4">Confirmation</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-sm-9">
                            @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session::get('success_message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> @endif @if (Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ session::get('error_message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> @endif
                            <div class="card">
                                <div class="card-body">

                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-shipping" role="tabpanel"
                                            aria-labelledby="v-pills-shipping-tab">
                                            <div>
                                                <h4 class="card-title">Shipping information</h4>
                                                <p class="card-title-desc">Fill all information below</p>

                                                {{-- form for storing only delivery address  --}}
                                                <form method="POST"  @if (empty($edit_delivery_address['id']))
                                                action="{{ url('add-delivery-address') }}"
                                                @else
                                                action="{{ url('update-delivery-address/'.$edit_delivery_address['id']) }}"     @endif  >


                                                    @csrf
                                                    <div class="form-group row mb-4">
                                                        <label for="billing-name"
                                                            class="col-md-2 col-form-label">Name</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="name" class="form-control" id="billing-name"
                                                                placeholder="Enter your name" @if (!empty($edit_delivery_address['name'])) value="{{ $edit_delivery_address['name'] }}" @else value="{{ old('name') }}" @endif>

                                                                @if ($errors->has('name'))
                                                                    <span class="text-danger">*{{ $errors->first('name') }}</span>
                                                                 @endif
                                                            </div>

                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label for="billing-address"
                                                            class="col-md-2 col-form-label">Address</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control" name="address" id="billing-address" rows="3" placeholder="Enter full address">@if (!empty($edit_delivery_address['address'])){{ $edit_delivery_address['address'] }}@else {{ old('address') }} @endif</textarea>

                                                            @if ($errors->has('address'))
                                                             <span class="text-danger">*{{ $errors->first('address') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label for="billing-city"
                                                            class="col-md-2 col-form-label">City</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="city" id="billing-city" placeholder="Enter City" class="form-control" @if (!empty($edit_delivery_address['city'])) value="{{ $edit_delivery_address['city'] }}" @else value="{{ old('city') }}" @endif>

                                                                @if ($errors->has('city'))
                                                                    <span class="text-danger">*{{ $errors->first('city') }}</span>
                                                                 @endif
                                                            </div>
                                                    </div>


                                                    <div class="form-group row mb-4">
                                                        <label class="col-md-2 col-form-label">States</label>
                                                        <div class="col-md-10">
                                                           <input type="text" name="state" class="form-control" placeholder="Enter State" @if (!empty($edit_delivery_address['state'])) value="{{ $edit_delivery_address['state'] }}" @else value="{{ old('state') }}" @endif>

                                                           @if ($errors->has('state'))
                                                                    <span class="text-danger">*{{ $errors->first('state') }}</span>
                                                                 @endif

                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-4">
                                                        <label class="col-md-2 col-form-label">Country</label>
                                                        <div class="col-md-10">
                                                            <select class="form-select select2" name="country">
                                                                <option value="0">Select Country</option>
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{ $country['id'] }}"
                                                                        @if (!empty($edit_delivery_address['country']))
                                                                            @if ($country['id'] == $edit_delivery_address['country'])  selected =""
                                                                              @endif
                                                                              @elseif ($country['id'] == old('country'))  selected =""
                                                                         @endif>
                                                                        {{ $country['country_name'] }}</option>
                                                                    @endforeach
                                                            </select>
                                                             @if ($errors->has('country'))
                                                                    <span class="text-danger">*{{ $errors->first('country') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group row mb-0">
                                                        <label for="example-textarea"
                                                            class="col-md-2 col-form-label">Order Notes:</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control" id="example-textarea" rows="3" placeholder="Write some note.."></textarea>
                                                        </div>
                                                    </div> --}}
                                                    <div class="form-group row mb-4">
                                                        <label for="billing-pincode"
                                                            class="col-md-2 col-form-label">Pincode</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="pincode" class="form-control" id="billing-pincode"
                                                                placeholder="Enter your Pincode"@if (!empty($edit_delivery_address['pincode'])) value="{{ $edit_delivery_address['pincode'] }}" @else value="{{ old('pincode') }}" @endif>

                                                                @if ($errors->has('pincode'))
                                                                    <span class="text-danger">*{{ $errors->first('pincode') }}</span>
                                                                 @endif
                                                            </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label for="billing-phone"
                                                            class="col-md-2 col-form-label">Mobile</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="mobile" class="form-control" id="billing-phone"
                                                                placeholder="Enter your Phone no." @if (!empty($edit_delivery_address['mobile']))value="{{ $edit_delivery_address['mobile'] }}" @else value="{{ old('mobile') }}"  @endif>

                                                                @if ($errors->has('mobile'))
                                                                    <span class="text-danger">*{{ $errors->first('mobile') }}</span>
                                                                 @endif
                                                            </div>
                                                    </div>

                                                    <div class="text-end">
                                                       <button type="submit" name="save" value="save" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-payment" role="tabpanel"
                                            aria-labelledby="v-pills-payment-tab">
                                            {{-- form for storing all the checkout page information for proceeding shopping like , delivery address as well as payment options --}}

                                            <form action="{{ url('cart_checkout') }}" name="checkoutForm" id="checkoutForm" method="POST">
                                                @csrf
                                            <div>
                                                <h4 class="card-title">Payment information</h4>
                                                <p class="card-title-desc">Fill all information below</p>

                                                <div>
                                                    <div class="form-check form-check-inline font-size-16">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_methods" id="credit_debit_card">
                                                        <label class="form-check-label font-size-13"
                                                            for="credit_debit_card"><i
                                                                class="fab fa-cc-mastercard me-1 font-size-20 align-top"></i>
                                                            Credit / Debit Card</label>
                                                    </div>
                                                    <div class="form-check form-check-inline font-size-16">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_methods" id="paypal">
                                                        <label class="form-check-label font-size-13"
                                                            for="paypal"><i
                                                                class="fab fa-cc-paypal me-1 font-size-20 align-top"></i>
                                                            Paypal</label>
                                                    </div>
                                                    <div class="form-check form-check-inline font-size-16">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_methods" id="cod">
                                                        <label class="form-check-label font-size-13"
                                                            for="cod"><i
                                                                class="far fa-money-bill-alt me-1 font-size-20 align-top"></i>
                                                            Cash on Delivery</label>
                                                    </div>
                                                </div>

                                                <h5 class="mt-5 mb-3 font-size-15">For card Payment</h5>
                                                <div class="p-4 border">

                                                        <div class="form-group mb-0">
                                                            <label for="cardnumberInput">Card Number</label>
                                                            <input type="text" class="form-control"
                                                                id="cardnumberInput" placeholder="0000 0000 0000 0000">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group mt-4 mb-0">
                                                                    <label for="cardnameInput">Name on card</label>
                                                                    <input type="text" class="form-control"
                                                                        id="cardnameInput" placeholder="Name on Card">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group mt-4 mb-0">
                                                                    <label for="expirydateInput">Expiry date</label>
                                                                    <input type="text" class="form-control"
                                                                        id="expirydateInput" placeholder="MM/YY">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group mt-4 mb-0">
                                                                    <label for="cvvcodeInput">CVV Code</label>
                                                                    <input type="text" class="form-control"
                                                                        id="cvvcodeInput" placeholder="Enter CVV Code">
                                                                </div>
                                                            </div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-confir" role="tabpanel"
                                            aria-labelledby="v-pills-confir-tab">


                                            <div class="table-responsive border">
                                                <table class="table align-middle mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Product Desc</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Discount</th>
                                                            <th colspan="2">Sub Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @php $fashion_total_price = 0; @endphp

                                                        @foreach ($userCartItems as $item)
                                                            @php
                                                                // $productAttrPrice = Cart::getProductAttrPrice($item['product_id'] , $item['size']);
                                                                $productAttrPrice = Product::getDiscountedAttrPrice($item['product_id'], $item['size']);
                                                            @endphp
                                                            <tr>
                                                                <td>
                                                                    <img src="{{ asset('front/images/product_images/large/' . $item['product']['product_image']) }}"
                                                                        alt="product-img"  title="product-img"  class="avatar-md" />

                                                                </td>
                                                                <td>
                                                                    <h5 class="font-size-14 text-truncate">
                                                                        <a href=""
                                                                            class="text-dark">{{ $item['product']['product_name'] }}
                                                                            ({{ $item['product']['product_code'] }})</a>
                                                                    </h5>
                                                                    <p class="mb-0">Color : <span
                                                                            class="fw-medium">{{ $item['product']['product_color'] }}</span>
                                                                    </p>
                                                                    <p class="mb-0">Size : <span
                                                                            class="fw-medium">{{ $item['size'] }}</span>
                                                                    </p>
                                                                </td>

                                                                <td> Rs.  {{ $productAttrPrice['product_price'] }} </td>

                                                                <td>{{ $item['quantity'] }}</td>

                                                                <td>Rs. {{ $productAttrPrice['discount'] }}
                                                                </td>
                                                                <td>
                                                                    Rs.
                                                                    {{ $productAttrPrice['final_price'] * $item['quantity'] }}
                                                                </td>

                                                            </tr>
                                                            @php
                                                                $fashion_total_price = $fashion_total_price + $productAttrPrice['final_price'] * $item['quantity'];
                                                            @endphp
                                                        @endforeach




                                                        {{-- products items other than fashion category --}}

                                                        @php $second_total_price = 0; @endphp

                                                        @foreach ($user_cart_items as $item)
                                                            @php
                                                                $product_discounted_Price = Product::getDiscountedPriceforCart($item['product_id']);
                                                            @endphp
                                                            <tr>
                                                                <td>
                                                                    <img src="{{ asset('front/images/product_images/large/' . $item['product']['product_image']) }}"
                                                                        alt="product-img"
                                                                        title="product-img"
                                                                        class="avatar-md" />
                                                                </td>
                                                                <td>
                                                                    <h5 class="font-size-14 text-truncate">
                                                                        <a href=""
                                                                            class="text-dark">{{ $item['product']['product_name'] }}
                                                                            ({{ $item['product']['product_code'] }})</a>
                                                                    </h5>
                                                                    <p class="mb-0">Color : <span
                                                                            class="fw-medium">{{ $item['product']['product_color'] }}</span>
                                                                    </p>

                                                                </td>
                                                                <td> Rs.  {{ $item['product']['original_price'] }}  </td>
                                                                <td>{{ $item['quantity'] }}</td>
                                                                <td>Rs.{{ $product_discounted_Price['discount'] }}  </td>
                                                                <td> Rs. {{ $product_discounted_Price['discounted_price'] * $item['quantity'] }}  </td>

                                                            </tr>
                                                            @php
                                                                $second_total_price = $second_total_price + $product_discounted_Price['discounted_price'] * $item['quantity'];
                                                            @endphp
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <div class="col-lg-12">
                                                <div class="card border">
                                                    <div class="card-body">
                                                        <h4 class="card-title mb-3 ">Order Summary</h4>
                                                        @php
                                                        $total_price = 0 ;
                                                        //if user have only fashion related products in cart , then we will show total price of only fashion
                                                        if ($fashion_total_price>0 && $second_total_price == 0) {
                                                            $total_price = $fashion_total_price;
                                                        }
                                                        //if user have both fashion and other category products
                                                        if ($fashion_total_price > 0 && $second_total_price > 0 ) {
                                                            $total_price = $fashion_total_price +  $second_total_price;
                                                        }
                                                        //if user has no fashion products in cart
                                                        if ($second_total_price > 0 && $fashion_total_price == 0) {
                                                           $total_price = $second_total_price;
                                                        }

                                                    @endphp
                                                        <div class="table-responsive">
                                                            <table class="table mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Total :</td>
                                                                        <td>Rs. {{  $total_price }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Discount : </td>
                                                                        <td>- Rs. 0 </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Shipping Charge :</td>
                                                                        <td> Rs. 0 </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Estimated Tax : </td>
                                                                        <td> Rs . 0</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Grand Total :</th>
                                                                        <th>Rs. {{  $total_price }}</th>
                                                                        {{-- session to store send the  grand total value to proceed to shiiping btn --}}
                                                                        @php
                                                                            Session::put('grand_total' , $total_price);
                                                                        @endphp
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- end table-responsive -->
                                                    </div>
                                                </div>
                                                <!-- end card -->
                                            </div>


                                            <h5 class="mt-4 mb-3 font-size-15">Delivery Address</h5>
                                            <div class="table-responsive border">
                                                <table class="table align-middle mb-0">
                                                    <tbody>

                                                    @foreach ($delivery_addresses as $delivery_address)
                                                    <tr>
                                                        <td>
                                                            {{-- <div class="control-group">
                                                                <input type="radio" name="" id="">
                                                                <label for="" class="control-label">{{ $delivery_address['name']}}</label>

                                                            </div> --}}
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="delivery_address" id="delivery_address{{ $delivery_address['id'] }}" value="{{ $delivery_address['id'] }}">
                                                                <label class="form-check-label px-2"
                                                                    for="delivery_address">

                                                                        Name : {{ $delivery_address['name']}} <br>
                                                                        Address :{{ $delivery_address['address']}} <br>
                                                                        City : {{ $delivery_address['city']}} ,
                                                                        State : {{ $delivery_address['state']}} ,
                                                                        Country :{{ $delivery_address['country']}} ,
                                                                        Pincode:{{ $delivery_address['pincode']}} <br>
                                                                        Mobile : {{ $delivery_address['mobile']}} <br>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td><a href="{{ url('edit-delivery-address/'.$delivery_address['id']) }}"><button class="btn btn-info">Edit</button></a>
                                                        <a class="delete_delivery_address" href="{{ url('delete-delivery-address/'.$delivery_address['id']) }}"><button class="btn btn-danger">Delete</button></td></a>
                                                    </tr>
                                                    </tbody>
                                                    @endforeach
                                                </table>
                                            </div>
                                            <a href="{{ url('checkout') }}"><button class="btn btn-primary mt-3">Add Address</button></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <a href="{{ route('cart') }}"
                                        class="btn text-muted d-none d-sm-inline-block btn-link">
                                        <i class="mdi mdi-arrow-left me-1"></i> Back to Shopping Cart </a>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-end">
                                        <button type="submit" name="proceed_to_shopping"
                                        value="proceed_to_shopping" class="btn btn-primary">
                                        proceed_to_shopping</button>
                                    {{-- <button type="submit" name="proceed_to_shopping" value="proceed_to_shopping" class="btn btn-success"> <i class="mdi mdi-truck-fast me-1"></i>Proceed to Shipping</button> --}}
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        </form>
                        {{-- closing chekout form --}}


                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->



    </div>
@endsection
