<?php
use App\Models\Section;
use App\Models\Product;

$sections = Section::sections();

?>


    <div class="row mb-3">
        <div class="col-xl-4 col-sm-6">
            <div class="mt-2">

                    <h5>{{ $categoryDetails['catDetails']['category_name'] }}
                        @if ( $categoryDetails['catDetails']['category_discount'] >0)
                        <div class="avatar-sm product-ribbon" style="font-size: 10px; width:35px; height:35px">
                            <span class="avatar-title rounded-circle  bg-primary">{{ $categoryDetails['catDetails']['category_discount'] }}%</span>
                        </div>
                        @endif
                    </h5>


            </div>
        </div>
        <div class="col-lg-8 col-sm-6">
             <span class="text-muted pull-right float-end">{{ count($catgoryProducts) }} Products are available</span>


        </div>

    </div>

    <div class="row">
        @foreach ($catgoryProducts as $product)
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="product-img position-relative">
                            @if ( $product['product_discount'] > 0)
                            <div class="avatar-sm product-ribbon">
                                <span class="avatar-title rounded-circle  bg-primary">{{ $product['product_discount'] }}%</span>
                            </div>
                            @endif

                            <a href="{{ url($product['product_url'].'/'.$product['id']) }}">
                                @if (isset($product['product_image']))
                                <?php $product_image_path = 'front/images/product_images/small/' . $product['product_image']; ?>

                                @else
                                <?php $product_image_path = ''; ?>

                                @endif

                                @if (!empty($product['product_image']) && file_exists($product_image_path))
                                    <img src="{{ asset($product_image_path) }}" alt=""
                                        class="img-fluid mx-auto d-block">

                                @else
                                <img src="{{ asset('front/images/product_images/small/no-img.png') }}" alt=""
                                class="img-fluid mx-auto d-block">
                                @endif
                            </a>
                        </div>
                        <div class="mt-4 text-center">
                            <h5 class="mb-3 text-truncate"><a href="#"
                                    class="text-dark">{{ $product['product_name'] }}</a></h5>

                            <p class="text-muted">
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                            </p>
                            <p>{{ $product['brand']['brand_name'] }}</p>
                            <?php $discountedPrice = Product::getDiscountedPrice($product['id']); ?>
                            @if ($discountedPrice > 0)
                                <h5 class="my-0"><span
                                        class="text-muted me-2"><del>M.R.P:{{ number_format($product['original_price'], 2) }}</del></span>
                                    <b>Rs.{{ number_format($discountedPrice) }}</b></h5>
                            @else
                                <h5 class="my-0">
                                    <b>Rs. {{ number_format($product['original_price'], 2) }}</b></h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">

            <div class="pagination mt-3 mb-4 pb-1">

              {{-- @if (isset($data['sort']) && !empty($data['sort']))
              {{ $catgoryProducts->appends(['sort' => $data['sort']])->links() }}
              @else
              {{ $catgoryProducts->links('pagination::bootstrap-5') }}
              @endif --}}
              @if (isset($_GET['sort']))
                  <div>{{ $catgoryProducts->appends(['sort' => $_GET['sort']])->links() }}</div>
              @else
                  <div>{{ $catgoryProducts->links('pagination::bootstrap-5') }}</div>
              @endif

            </div>


        </div>
    </div>

