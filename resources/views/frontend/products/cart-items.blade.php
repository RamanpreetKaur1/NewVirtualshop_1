@php
    // use App\Models\Cart;
    use App\Models\Product;
@endphp

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
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
                                $productAttrPrice = Product::getDiscountedAttrPrice($item['product_id'] , $item['size']);
                            @endphp
                            <tr>
                                <td>
                                    <img src="{{ asset('front/images/product_images/large/'.$item['product']['product_image']) }}" alt="product-img"
                                        title="product-img" class="avatar-md" />
                                </td>
                                <td>
                                    <h5 class="font-size-14 text-truncate"><a href="" class="text-dark">{{ $item['product']['product_name'] }} ({{ $item['product']['product_code'] }})</a></h5>
                                    <p class="mb-0">Color : <span class="fw-medium">{{ $item['product']['product_color'] }}</span></p>
                                    <p class="mb-0">Size : <span class="fw-medium">{{ $item['size'] }}</span></p>
                                </td>

                                <td> Rs. {{ $productAttrPrice['product_price'] }}  </td>
                                <td>
                                    <div style="width: 120px;">
                                        <div class="input-group  bootstrap-touchspin bootstrap-touchspin-injected quantity">
                                            <input type="text" value="{{ $item['quantity'] }}" name="" class="qty-input form-control">
                                            <span class="input-group-btn-vertical">
                                                <button class="btn btn-primary bootstrap-touchspin-up increment-btn  btnItemUpdate qtyPlus" data-cartid="{{ $item['id'] }}" type="button">+</button>
                                                <button class="btn btn-primary bootstrap-touchspin-down  decrement-btn btnItemUpdate qtyMinus" data-cartid="{{ $item['id'] }}" type="button">-</button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>Rs. {{ $productAttrPrice['discount'] }}</td>
                                <td>
                                    Rs. {{ $productAttrPrice['final_price'] * $item['quantity'] }}
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon text-danger cartItemDelete"  data-cartid="{{ $item['id'] }}"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                                </td>
                            </tr>
                            @php
                                $fashion_total_price = $fashion_total_price + ($productAttrPrice['final_price'] * $item['quantity']);
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
                                    <img src="{{ asset('front/images/product_images/large/'.$item['product']['product_image']) }}" alt="product-img"
                                        title="product-img" class="avatar-md" />
                                </td>
                                <td>
                                    <h5 class="font-size-14 text-truncate"><a href="" class="text-dark">{{ $item['product']['product_name'] }} ({{ $item['product']['product_code'] }})</a></h5>
                                    <p class="mb-0">Color : <span class="fw-medium">{{ $item['product']['product_color'] }}</span></p>

                                </td>

                                <td> Rs. {{ $item['product']['original_price'] }}  </td>
                                <td>
                                    <div style="width: 120px;">
                                        <div class="input-group  bootstrap-touchspin bootstrap-touchspin-injected quantity">
                                            <input type="text" value="{{ $item['quantity'] }}" name="" class="qty-input form-control">
                                            <span class="input-group-btn-vertical">
                                                <button class="btn btn-primary bootstrap-touchspin-up increment-btn  btnItemUpdate qtyPlus" data-cartid="{{ $item['id'] }}" type="button">+</button>
                                                <button class="btn btn-primary bootstrap-touchspin-down  decrement-btn btnItemUpdate qtyMinus" data-cartid="{{ $item['id'] }}" type="button">-</button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>Rs. {{ $product_discounted_Price['discount'] }}</td>
                                <td>
                                    Rs. {{ $product_discounted_Price['discounted_price'] * $item['quantity'] }}
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon text-danger cartItemDelete"  data-cartid="{{ $item['id'] }}"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                                </td>
                            </tr>
                            @php
                                $second_total_price = $second_total_price + ( $product_discounted_Price['discounted_price'] * $item['quantity']);
                            @endphp
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <a href="{{ route('listing_products') }}" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                    </div> <!-- end col -->
                    <div class="col-sm-6">
                        <div class="text-sm-end mt-2 mt-sm-0">
                            <a href="ecommerce-checkout.html" class="btn btn-success">
                                <i class="mdi mdi-cart-arrow-right me-1"></i> Checkout </a>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row-->
            </div>
        </div>
    </div>

        <div class="col-lg-12">
            <div class="card float-end">
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
            <!-- end card -->
        </div>

    {{-- </div> --}}
</div>
