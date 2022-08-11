<?php use App\Models\Product; ?> @extends('frontend.layout.layout') @section('content') @section('title') Virtual Shop : Online Shopping Site in India @endsection
	<!-- ============================================================== -->
	<!-- Start right Content here -->
	<!-- ============================================================== -->
	<div class="main-content">
		<div class="page-content"> {{--
			<div class="container"> --}}
				<div class="col-lg-12"> {{--
					<div class="card">
						<div class="card-body">
							<h4 class="card-title"></h4>
							<p class="card-title-desc"></p> --}}
							<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000"> {{--
								<ol class="carousel-indicators">
									<li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
									<li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
									<li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
								</ol> --}}
								<div class="carousel-inner" role="listbox"> @php $i = 1; @endphp @foreach ($sliderbanners as $banner)
									<div class="carousel-item {{ $i == '1' ? 'active' : '' }}"> @php $i++; @endphp
										<a @if (!empty($banner[ 'link'])) href="{{ url($banner['link']) }}" @else href="javascript:void(0);" @endif> <img title="{{ $banner['title'] }}" class="d-block img-fluid" src="{{ asset('front/images/banner_images/' . $banner['image']) }}" alt="{{ $banner['alt'] }}" height="50px"> </a>
									</div> @endforeach </div>
								<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
								<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
							</div> {{-- </div>
					</div> --}} </div>
				<!-- end col -->{{--
				<div class="col-xl-6"> --}}
                    <div class="container-fluid mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                <p class="card-title-desc"></p>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#bestseller" role="tab"> <span class="d-block d-sm-none"><i class="fas fa-home"></i></span> <span class="d-none d-sm-block">Best Sellers</span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#newarrivals" role="tab"> <span class="d-block d-sm-none"><i class="far fa-user"></i></span> <span class="d-none d-sm-block">New Arrivals</span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#trending" role="tab"> <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span> <span class="d-none d-sm-block">Trending Products </span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#discounted" role="tab"> <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span> <span class="d-none d-sm-block">Discounted Products </span> </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#featured" role="tab"> <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span> <span class="d-none d-sm-block">Featured Products </span> </a>
                                    </li>

                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="bestseller" role="tabpanel"> {{-- Best Seller Products --}}
                                        <div class="mt-4 py-4">
                                            <div class="container">
                                                <div class="row">
                                                    <h3>Best Sellers</h3>

                                                    <div class="owl-carousel owl-theme newArrival_carousel"> @foreach ($bestseller as $product)
                                                        <div class="item">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <a href="{{ url('products/'.$product['id']) }}">
                                                                        <div class="product-img position-relative"> @if ($product['product_discount']>0)
                                                                            <div class="avatar-sm product-ribbon"> <span class="avatar-title rounded-circle  bg-primary">{{ $product['product_discount'] }}%</span> </div> @endif <img src="{{ asset('front/images/product_images/small/' . $product['product_image']) }}" width="100px" height="40px" alt="New Arrival Product" class="img-fluid mx-auto d-block"> </div>
                                                                        <div class="mt-4 text-center">
                                                                            <h5 class="mb-3 text-truncate"><a href="{{ url('products/'.$product['id']) }}"
                                                            class="text-dark">{{ $product['product_name'] }}</a></h5>
                                                                            <hr> {{--
                                                                            <p class="text-muted"> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star"></i> </p> --}}
                                                                            <?php  $getDiscountedPrice = Product::getDiscountedPrice($product['id']); ?>
                                                                            @if ($getDiscountedPrice > 0)
                                                                                <h5 class="my-0"><span class="text-muted me-2 small"><del>M.R.P:{{ number_format($product['original_price'], 2) }}</del></span>
                                                                                     <b>Rs.{{ number_format($getDiscountedPrice) }}</b></h5> @else
                                                                                <h5 class="my-0">  <b>Rs.{{ number_format($product['original_price'], 2) }}</b></h5> @endif </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div> @endforeach </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="newarrivals" role="tabpanel"> {{-- New Arrival Products --}}
                                        <div class="mt-4 py-4">
                                            <div class="container">
                                                <div class="row">
                                                    <h3>New Arrival Products</h3>

                                                    <div class="owl-carousel owl-theme newArrival_carousel"> @foreach ($new_arrival_products as $product)
                                                        <div class="item">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <a href="{{ url('products/'.$product['id']) }}">
                                                                        <div class="product-img position-relative"> @if ($product['product_discount']>0)
                                                                            <div class="avatar-sm product-ribbon"> <span class="avatar-title rounded-circle  bg-primary">{{ $product['product_discount'] }}%</span> </div> @endif <img src="{{ asset('front/images/product_images/small/' . $product['product_image']) }}" width="100px" height="40px" alt="New Arrival Product" class="img-fluid mx-auto d-block"> </div>
                                                                        <div class="mt-4 text-center">
                                                                            <h5 class="mb-3 text-truncate"><a href="{{ url('products/'.$product['id']) }}"
                                                            class="text-dark">{{ $product['product_name'] }}</a></h5>
                                                                            <hr> {{--
                                                                            <p class="text-muted"> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star"></i> </p> --}}
                                                                            <?php  $getDiscountedPrice = Product::getDiscountedPrice($product['id']); ?>
                                                                             @if ($getDiscountedPrice > 0)
                                                                                <h5 class="my-0"><span class="text-muted me-2 small"><del>M.R.P:{{ number_format($product['original_price'], 2) }}</del></span>
                                                        <b>Rs.{{ number_format($getDiscountedPrice) }}</b></h5> @else
                                                                                <h5 class="my-0">  <b>Rs.{{ number_format($product['original_price'], 2) }}</b></h5> @endif </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div> @endforeach </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="trending" role="tabpanel">
                                        {{-- Trending Products --}}
                                        <div class="mt-4 py-4">
                                            <div class="container">
                                                <div class="row">
                                                    <h3> Trending Products</h3>

                                                    <div class="owl-carousel owl-theme newArrival_carousel"> @foreach ($trending_products as $product)
                                                        <div class="item">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <a href="{{ url('products/'.$product['id']) }}">
                                                                        <div class="product-img position-relative"> @if ($product['product_discount']>0)
                                                                            <div class="avatar-sm product-ribbon"> <span class="avatar-title rounded-circle  bg-primary">{{ $product['product_discount'] }}%</span> </div> @endif <img src="{{ asset('front/images/product_images/small/' . $product['product_image']) }}" width="100px" height="40px" alt="New Arrival Product" class="img-fluid mx-auto d-block"> </div>
                                                                        <div class="mt-4 text-center">
                                                                            <h5 class="mb-3 text-truncate"><a href="{{ url('products/'.$product['id']) }}"
                                                            class="text-dark">{{ $product['product_name'] }}</a></h5>
                                                                            <hr> {{--
                                                                            <p class="text-muted"> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star"></i> </p> --}}
                                                                            <?php  $getDiscountedPrice = Product::getDiscountedPrice($product['id']); ?>
                                                                             @if ($getDiscountedPrice > 0)
                                                                                <h5 class="my-0"><span class="text-muted me-2 small"><del>M.R.P:{{ number_format($product['original_price'], 2) }}</del></span>
                                                        <b>Rs.{{ number_format($getDiscountedPrice) }}</b></h5> @else
                                                                                <h5 class="my-0">  <b>Rs.{{ number_format($product['original_price'], 2) }}</b></h5> @endif </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div> @endforeach </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="discounted" role="tabpanel"> {{-- Discounted Products --}}
                                        <div class="mt-4 py-4">
                                            <div class="container">
                                                <div class="row">
                                                    <h3>Discounted Products</h3>

                                                    <div class="owl-carousel owl-theme discounted_carousel"> @foreach ($discounted_products as $product)
                                                        <div class="item">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <a href="{{ url('products/'.$product['id']) }}">
                                                                        <div class="product-img position-relative"> @if ($product['product_discount']>0)
                                                                            <div class="avatar-sm product-ribbon"> <span class="avatar-title rounded-circle  bg-primary">{{ $product['product_discount'] }}%</span> </div> @endif <img src="{{ asset('front/images/product_images/small/' . $product['product_image']) }}" width="100px" height="40px" alt="New Arrival Product" class="img-fluid mx-auto d-block"> </div>
                                                                        <div class="mt-4 text-center">
                                                                            <h5 class="mb-3 text-truncate"><a href="{{ url('products/'.$product['id']) }}"
                                                            class="text-dark">{{ $product['product_name'] }}</a></h5>
                                                                            <hr> {{--
                                                                            <p class="text-muted"> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star"></i> </p> --}}
                                                                            <?php  $getDiscountedPrice = Product::getDiscountedPrice($product['id']); ?> @if ($getDiscountedPrice > 0)
                                                                                <h5 class="my-0"><span class="text-muted me-2 small"><del>M.R.P:{{ number_format($product['original_price'], 2) }}</del></span>
                                                        <b>Rs.{{ number_format($getDiscountedPrice) }}</b></h5> @else
                                                                                <h5 class="my-0">  <b>{{ number_format($product['original_price'], 2) }}</b></h5> @endif </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div> @endforeach </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="featured" role="tabpanel">
                                        {{-- Featured Products --}}
                                        <div class="mt-4 py-4">
                                            <div class="container">
                                                <div class="row">
                                                    <h3> Featured Products</h3>

                                                    <div class="owl-carousel owl-theme newArrival_carousel">
                                                        @foreach ($featured_products as $product)
                                                        <div class="item">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <a href="{{ url('products/'.$product['id']) }}">
                                                                        <div class="product-img position-relative"> @if ($product['product_discount']>0)
                                                                            <div class="avatar-sm product-ribbon"> <span class="avatar-title rounded-circle  bg-primary">{{ $product['product_discount'] }}%</span> </div> @endif <img src="{{ asset('front/images/product_images/small/' . $product['product_image']) }}" width="100px" height="40px" alt="New Arrival Product" class="img-fluid mx-auto d-block"> </div>
                                                                        <div class="mt-4 text-center">
                                                                            <h5 class="mb-3 text-truncate"><a href="{{ url('products/'.$product['id']) }}"
                                                            class="text-dark">{{ $product['product_name'] }}</a></h5>
                                                                            <hr> {{--
                                                                            <p class="text-muted"> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star"></i> </p> --}}
                                                                            <?php  $getDiscountedPrice = Product::getDiscountedPrice($product['id']); ?>
                                                                             @if ($getDiscountedPrice > 0)
                                                                                <h5 class="my-0"><span class="text-muted me-2 small"><del>M.R.P:{{ number_format($product['original_price'], 2) }}</del></span>
                                                        <b>Rs.{{ number_format($getDiscountedPrice) }}</b></h5> @else
                                                                                <h5 class="my-0">  <b>Rs.{{ number_format($product['original_price'], 2) }}</b></h5> @endif </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div> @endforeach </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="settings1" role="tabpanel">
                                        <p class="mb-0"> Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade keffiyeh craft. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}

                {{-- Fix banners --}}
                 @if (isset($fixbanners[0]['image'])) {{--
				< ?php echo "<pre>"; print_r($fixbanners); die; ?> --}}
					<div class="container">
						<div class="my-5">
							<a href="{{ url($fixbanners[0]['link']) }}"> <img class="d-block img-fluid" src="{{ asset('front/images/banner_images/' . $fixbanners[0]['image']) }}" title="{{ $fixbanners[0]['title'] }}" alt="{{ $fixbanners[0]['alt'] }}"> </a>
						</div>
					</div> @endif

                     {{-- Popular Categories --}}
					<div class="py-1">
						<div class="container">
							<div class="row"> {{--
								<h2>Popular Categories</h2> --}}
								<div class="row mb-2">
									<div class="col-sm-4">
										<div class="me-2 mb-2 d-inline-block">
											<div class="position-relative">
												<h2>Popular Categories</h2> </div>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="text-sm-end">
											<a href="{{ url('all_categories') }}">
												<button type="button" class="btn btn-primary btn-rounded waves-effect waves-light mb-2 me-2">View All Categories</button>
											</a>
										</div>
									</div>
									<!-- end col-->
								</div>
								<hr>
								<div class="owl-carousel owl-theme popular_carousel"> @foreach ($popular_categories as $category)
									<div class="item">
										<div class="card">
											<div class="card-body">
												<div class="product-img position-relative">
													<div class="avatar-sm product-ribbon"> <span class="avatar-title rounded-circle  bg-primary">{{ $category->category_discount }}%</span> </div> <img src="{{ asset('front/images/category_images/' . $category->category_image) }}" width="100px" alt="Popular category" class="img-fluid mx-auto d-block"> </div>
												<div class="mt-4 text-center">
													<h5 class="mb-3 text-truncate"><a href="#"
                                                    class="text-dark">{{ $category->category_name }}</a></h5> {{--
													<p class="text-muted"> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star"></i> </p> --}} </div>
											</div>
										</div>
									</div> @endforeach </div>
							</div>
						</div>
					</div>
                    {{-- </div> --}} </div>
	</div> @endsection {{-- @section('scripts')
	<script>
	//owl carousel
	$('.trending_carousel').owlCarousel({
		loop: true,
		margin: 10,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			600: {
				items: 3,
				nav: false
			},
			1000: {
				items: 3,
				nav: true,
				loop: false
			}
		}
	});
	</script> @endsection --}}
