<?php use App\Models\Product; ?> @extends('frontend.layout.layout') @section('content') @section('title') Virtual shop @endsection @endsection
	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid">
				<!-- start page title -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between">
							<h4 class="mb-sm-0 font-size-18">Product Detail</h4>
							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="{{ url('/') }}">V-shop</a></li>
									<li class="breadcrumb-item"><a href="{{ url('/'.$productDetails['category']['category_url']) }}">{{ $productDetails['category']['category_name'] }}</a></li>
									<li class="breadcrumb-item active">{{ $productDetails['product_name'] }}</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
				<!-- end page title -->
				<div class="row">
					<div class="col-lg-12"> @if (Session::has('success_message'))
						<div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session::get('success_message') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div> @endif @if (Session::has('error_message'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ session::get('error_message') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div> @endif
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-xl-6">
										<div class="product-detai-imgs">
											<div class="row">
												<div class="col-md-2 col-sm-3 col-4">
													<div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical"> @foreach ($productDetails['images'] as $image)
														<a class="nav-link" id="{{ $image['id'] }}-tab" data-bs-toggle="pill" href="{{ $image['id'] }}" role="tab" aria-controls="{{ $image['id'] }}" aria-selected="true"> <img src="{{ asset('front/images/product_images/small/'.$image['image']) }}" alt="" class="img-fluid mx-auto d-block rounded"> </a> @endforeach {{-- @foreach ($productDetails['images'] as $image)
														<a class="nav-link" id="product-2-tab" data-bs-toggle="pill" href="#product-2" role="tab" aria-controls="product-2" aria-selected="false"> <img src="{{ asset('front/images/product_images/small/'.$image['image']) }}" alt="" class="img-fluid mx-auto d-block rounded"> </a> @endforeach --}} {{--
														<a class="nav-link" id="product-3-tab" data-bs-toggle="pill" href="#product-3" role="tab" aria-controls="product-3" aria-selected="false"> <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block rounded"> </a>
														<a class="nav-link" id="product-4-tab" data-bs-toggle="pill" href="#product-4" role="tab" aria-controls="product-4" aria-selected="false"> <img src="assets/images/product/img-8.png" alt="" class="img-fluid mx-auto d-block rounded"> </a> --}} </div>
												</div>
												<div class="col-md-7 offset-md-1 col-sm-9 col-8">
													<div class="tab-content" id="v-pills-tabContent"> {{-- @foreach ($productDetails['images'] as $image)
														<div class="tab-pane fade" id="{{ $image['id'] }}" role="tabpanel" aria-labelledby="{{ $image['id'] }}-tab">
															<div> <img src="{{ asset('front/images/product_images/small/'.$image['image']) }}" alt="" class="img-fluid mx-auto d-block rounded"> </div>
														</div> @endforeach --}}
														<div class="tab-pane fade show active" id="product-2" role="tabpanel" aria-labelledby="product-2-tab">
															<div> <img src="{{ asset('front/images/product_images/small/'.$productDetails['product_image']) }}" alt="" class="img-fluid mx-auto d-block"> </div>
														</div> {{--
														<div class="tab-pane fade" id="product-3" role="tabpanel" aria-labelledby="product-3-tab">
															<div> <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block"> </div>
														</div> --}} {{--
														<div class="tab-pane fade" id="product-4" role="tabpanel" aria-labelledby="product-4-tab">
															<div> <img src="{{ asset('front/images/product_images/small/'.$productDetails['product_image']) }}" alt="" class="img-fluid mx-auto d-block"> </div>
														</div> --}} </div> @if ($productDetails['section']['name'] == 'Fashion')
													<form action="{{ url('add-to-cart') }}" method="POST" class="form-horizontal"> @csrf
														<input type="hidden" name="product_id" value="{{ $productDetails['id'] }}">
														<div class="text-center">

															<button type="submit" class="btn btn-primary waves-effect waves-light mt-2 me-1"> <i class="bx bx-cart me-2"></i> Add to cart </button>
															<button type="button" class="btn btn-success waves-effect  mt-2 waves-light"> <i class="bx bx-shopping-bag me-2"></i>Buy now </button>
															<div class="row mt-2 mb-3">
																<div class="col-4">
																	<h5 class="font-size-15">Quantity :</h5> </div>
																<div class="col-4">
																	<div style="width: 190px;"> {{-- demo vertical is for quantity --}}
																		<input type="text" value="1" name="demo_vertical" class=""> </div>
																</div>
															</div>
														</div> {{-- </form> --}}
                                                         {{-- add to cart for the products other than fashion --}} @else
													<form action="{{ url('add-products-to-cart') }}" method="POST" class="form-horizontal"> @csrf
														<input type="hidden" name="product_id" value="{{ $productDetails['id'] }}">
														<div class="text-center">
															<button type="submit" class="btn btn-primary waves-effect waves-light mt-2 me-1"> <i class="bx bx-cart me-2"></i> Add to cart </button>
															<button type="button" class="btn btn-success waves-effect  mt-2 waves-light"> <i class="bx bx-shopping-bag me-2"></i>Buy now </button>
															<div class="row mt-2 mb-3">
																<div class="col-4">
																	<h5 class="font-size-15">Quantity :</h5> </div>
																<div class="col-4">
																	<div style="width: 190px;"> {{-- demo vertical is for quantity --}}
																		<input type="text" value="1" name="demo_vertical" class=""> </div>
																</div>
															</div>
														</div>
													</form> @endif </div>
											</div>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="mt-4 mt-xl-3"> <a href="#" class="text-primary">{{ $productDetails['brand']['brand_name'] }}</a>
											<h4 class="mt-1 mb-3">{{ $productDetails['product_name'] }}</h4> {{--
											<p class="text-muted float-start me-3"> <span class="bx bxs-star text-warning"></span> <span class="bx bxs-star text-warning"></span> <span class="bx bxs-star text-warning"></span> <span class="bx bxs-star text-warning"></span> <span class="bx bxs-star"></span> </p>
											<p class="text-muted mb-4">( 152 Customers Review )</p> --}} @if ($productDetails['section']['name'] == 'Fashion') <small class="text-muted mb-4">{{ $total_stock }} items are available</small> @endif @if ($productDetails['product_discount'] > 0)
											<h6 class="text-success text-uppercase" style="font-size: 25px">{{ $productDetails['product_discount'] }}%</h6> {{-- @elseif ($categoryDetails['catDetails']['category_discount'] >0)
											<h6 class="text-success text-uppercase">{{ $productDetails['product_discount'] }}%</h6> --}} @endif
											<?php  $getDiscountedPrice = Product::getDiscountedPrice($productDetails['id']); ?> {{-- @if ($getDiscountedPrice > 0)
												<h5 class="mb-4"><span class="text-muted me-2"><del>M.R.P. : {{ number_format($productDetails['original_price'] )}}</del></span>
                                                    Deal Price :  <b>Rs.{{ number_format($getDiscountedPrice) }}</b></h5> @else
												<h5 class="mb-4">Price : <span class="text-muted me-2"><b>{{ number_format($productDetails['original_price'], 2) }}</b></span> </h5> @endif --}}
												<br> @if ($productDetails['section']['name'] == 'Fashion')
												<form action="" class="form-horizontal">
													<h4 class="getAttrPrice mt-3">Rs.{{ number_format($productDetails['original_price'] )}}</h4>
													<select name="size" id="getPrice" class="form-select" product-id={{ $productDetails['id'] }}>
														<option value="">Select Size </option> @foreach ($productDetails['attributes'] as $attribute)
														<option value="{{ $attribute['size'] }}">{{ $attribute['size'] }}</option> @endforeach </select>
                                                        @if ($errors->has('size'))
                                                        <span
                                                            class="text-danger">*{{ $errors->first('size') }}</span>
                                                    @endif
                                                        {{-- @if (isset('size') !== '')
                                                            @php
                                                                echo "size  selected"; die;
                                                            @endphp
                                                        @endif --}}
												</form>
												<br>
												<br> @else @if ($getDiscountedPrice > 0)
												<h5 class="mb-4"><span class="text-muted me-2"><del>M.R.P. : {{ number_format($productDetails['original_price'] )}}</del></span>
                                                    Deal Price :  <b>Rs.{{ number_format($getDiscountedPrice) }}</b></h5> @else
												<h5 class="mb-4">Price : <span class="text-muted me-2"><b>{{ number_format($productDetails['original_price'], 2) }}</b></span> </h5> @endif @endif {{--
												<h5 class="mb-4">Price : <span class="text-muted me-2"><del>M.R.P. : {{ $productDetails['original_price'] }}</del></span> </h5>
												<br>
												<h5 class="mb-4">Deal Price :  <b>Rs.{{ number_format($productDetails['']) }}</b></h5> --}} {{--
												<p class="text-muted mb-4">To achieve this, it would be necessary to have uniform grammar pronunciation and more common words If several languages coalesce</p> --}} {{--
												<div class="row mb-3">
													<div class="col-md-6">
														<div>
															<p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Wireless</p>
															<p class="text-muted"><i class="bx bx-shape-triangle font-size-16 align-middle text-primary me-1"></i> Wireless Range : 10m</p>
															<p class="text-muted"><i class="bx bx-battery font-size-16 align-middle text-primary me-1"></i> Battery life : 6hrs</p>
														</div>
													</div>
													<div class="col-md-6">
														<div>
															<p class="text-muted"><i class="bx bx-user-voice font-size-16 align-middle text-primary me-1"></i> Bass</p>
															<p class="text-muted"><i class="bx bx-cog font-size-16 align-middle text-primary me-1"></i> Warranty : 1 Year</p>
														</div>
													</div>
												</div> --}} {{--
												<div class="product-color">
													<h5 class="font-size-15">Color :</h5>
													<a href="#" class="active">
														<div class="product-color-item border rounded"> <img src="assets/images/product/img-7.png" alt="" class="avatar-md"> </div>
														<p>Black</p>
													</a>
													<a href="#">
														<div class="product-color-item border rounded"> <img src="assets/images/product/img-7.png" alt="" class="avatar-md"> </div>
														<p>Blue</p>
													</a>
													<a href="#">
														<div class="product-color-item border rounded"> <img src="assets/images/product/img-7.png" alt="" class="avatar-md"> </div>
														<p>Gray</p>
													</a>
												</div> --}} {{--
												<div class="row mt-2 mb-3">
													<div class="col-4">
														<h5 class="font-size-15">Quantity :</h5> </div>
													<div class="col-4">
														<div style="width: 190px;">
															<input type="text" value="1" name="demo_vertical" class=""> </div>
													</div>
												</div> --}}
												<div class="col-md-6">
													<h4 class="mt-1 mb-3">About this item </h4>
													<p> {{ $productDetails['product_description'] }} </p>
												</div>
										</div>
										</form>
									</div>
								</div>
								<!-- end row -->
								<div class="mt-5">
									<h5 class="mb-3">Specifications :</h5>
									<div class="table-responsive">
										<table class="table mb-0 table-bordered">
											<tbody>
												<tr>
													<th scope="row" style="width: 400px;">Category</th>
													<td>{{ $productDetails['category']['category_name'] }}</td>
												</tr>
												<tr>
													<th scope="row">Brand</th>
													<td>{{ $productDetails['brand']['brand_name'] }}</td>
												</tr>
												<tr>
													<th scope="row">Color</th>
													<td>{{ $productDetails['product_color'] }}</td>
												</tr> @if ( !empty($productDetails['product_weight']))
												<tr>
													<th scope="row">Product Weight</th>
													<td>{{ $productDetails['product_weight'] }}</td>
												</tr> @endif {{--
												<tr>
													<th scope="row">Warranty Summary</th>
													<td>1 Year</td>
												</tr> --}} </tbody>
										</table>
									</div>
								</div>
								<!-- end Specifications -->{{-- customers reviews --}} </div>
						</div>
						<!-- end card -->
					</div>
				</div>
				<!-- end row -->
				<div class="row mt-3">
					<div class="col-lg-12">
						<div>
							<h5 class="mb-3">Related products :</h5>
							<div class="row"> @foreach ($related_products as $product)
								<div class="col-xl-4 col-sm-6">
									<div class="card">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-md-4"> <a href="{{ url($product['product_url'].'/'.$product['id']) }}">
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
                                                    </a> </div>
												<div class="col-md-8">
													<div class="text-center text-md-start pt-3 pt-md-0">
														<h5 class="text-truncate"><a href="#" class="text-dark">{{ $product['product_name'] }}</a></h5>
														<p class="text-muted mb-4"> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star text-warning"></i> <i class="bx bxs-star"></i> </p>
														<?php  $getDiscountedPrice = Product::getDiscountedPrice($product['id']); ?> @if ($getDiscountedPrice > 0)
															<h5 class="my-0"><span class="text-muted me-2 small"><del>M.R.P:{{ number_format($product['original_price'], 2) }}</del></span>
                                                             <b>Rs.{{ number_format($getDiscountedPrice) }}</b></h5> @else
															<h5 class="my-0">  <b>Rs.{{ number_format($product['original_price'], 2) }}</b></h5> @endif </div>
												</div>
											</div>
										</div>
									</div>
								</div> @endforeach </div>
							<!-- end row -->
						</div>
					</div>
				</div>
				<!-- end row -->
			</div>
			<!-- container-fluid -->
		</div>
		<!-- End Page-content -->
	</div>
