@extends('admin.layout.layout') @section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
            <div class="col-lg-12">
                <div class="text-sm-end m-4">
                    <a href="{{ url('admin/products') }}">   <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="bx bx-arrow-back me-1"></i> Back</button>  </a>
                </div>
            </div>
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0 font-size-18">Catalogue Management</h4>
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
								<li class="breadcrumb-item active">{{ $title }}</li>
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
							<h4 class="card-title">{{ $title }}</h4>
							<p class="card-title-desc">Fill all information below</p> @if (Session::has('error_message'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ session::get('error_message') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div> @endif @if (Session::has('success_message'))
							<div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session::get('success_message') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div> @endif @if ($errors->any()) @foreach ($errors->all() as $error)
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<p><i class="mdi mdi-alert-outline me-2"></i>{{ $error }}</p>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div> @endforeach @endif
							<form class="form-horizontal" @if (empty($products[ 'id'])) action="{{ url('admin/add_edit_products') }}" @else action="{{ url('admin/add_edit_products/' . $products['id']) }}" @endif method="POST" enctype="multipart/form-data"> @csrf
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="category_id" class="form-label">Select Category</label>
											<select name="category_id" id="category_id" class="form-control">
												<option value="">Select </option> @foreach ($categories as $section)
												<optgroup label="{{ $section['name'] }}"></optgroup> @foreach ($section['categories'] as $category)
												<option @if(!empty($products['category_id'] == $category['id'])) selected="" @endif value="{{ $category['id'] }}"> ---&nbsp;&nbsp;{{ $category['category_name'] }}</option> @foreach ($category['subcategories'] as $subcategory)
												<option @if(!empty($products['category_id'] == $subcategory['id'])) selected="" @endif value="{{ $subcategory['id'] }}"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;&nbsp;{{ $subcategory['category_name'] }} </option> @endforeach @endforeach @endforeach </select>
										</div>
										<div class="mb-3">
											<label for="product_name" class="form-label">Product Name</label>
											<input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" @if (!empty($products[ 'product_name'])) value="{{ $products['product_name'] }}" @else value="{{ old('product_name') }}" @endif> </div>
										<div class="mb-3">
											<label for="product_code" class="form-label">Product Code</label>
											<input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter Product Code"  @if (!empty($products[ 'product_code'])) value="{{ $products['product_code'] }}" @else value="{{ old('product_code') }}" @endif> </div>
										<div class="mb-3">
											<label for="original_price" class="form-label">Original  Price</label>
											<input type="number" class="form-control" id="original_price" name="original_price" placeholder="Enter Original Price"  @if (!empty($products[ 'original_price'])) value="{{ $products['original_price'] }}" @else value="{{ old('original_price') }}" @endif> </div>

                                        <div class="mb-3">
                                                <label for="product_qty" class="form-label">Product Quantity</label>
                                                <input type="number" class="form-control" id="product_qty" name="product_qty" placeholder="Enter Product Quantity"  @if (!empty($products[ 'product_qty'])) value="{{ $products['product_qty'] }}" @else value="{{ old('product_qty') }}" @endif> </div>
                                        <div class="mb-3">
                                                    <label for="tax" class="form-label">Tax</label>
                                                    <input type="number" class="form-control" id="tax" name="tax" placeholder="Enter Tax"  @if (!empty($products[ 'tax'])) value="{{ $products['tax'] }}" @else value="{{ old('tax') }}" @endif> </div>


										<div class="mb-3">
											<label for="product_description">Product Description</label>
											<textarea name="product_description" class="form-control" id="product_description" rows="3" placeholder="Enter Product Description" > @if (!empty($products['product_description'])) {{ $products['product_description'] }} @else {{ old('product_description') }} @endif </textarea>
										</div>
									</div>
									<div class="col-sm-6"> {{--
										<div class="mb-3">
											<label for="section_id" class="form-label">Select Section</label>
											<select name="section_id" id="section_id" class="form-control">
												<option value="">Select </option> @foreach ($getSections as $section)
												<option value="{{ $section['id'] }}" @if (!empty($category[ 'section_id']) && $category[ 'section_id']==$ section[ 'id']) selected="" @endif>{{ $section['name'] }} </option> @endforeach </select>
										</div> --}}
										<div class="mb-3">
											<label for="brand_id" class="form-label">Select Brand</label>
											<select name="brand_id" id="brand_id" class="form-control">
												<option value="">Select </option> @foreach ($brands as $brand)
												<option @if(!empty($products['brand_id'] == $brand['id'])) selected="" @endif value="{{ $brand['id'] }}">{{ $brand['brand_name'] }}</option> @endforeach </select>
										</div>

                                        {{-- <div id="appendBrandLevel">
                                            @include('admin.brands.append_brand_level')
                                        </div> --}}
										<div class="mb-3">
											<label for="product_weight" class="form-label">Product Weight</label>
											<input type="text" class="form-control" id="product_weight" name="product_weight" placeholder="Enter Product Weight" @if (!empty($products[ 'product_weight'])) value="{{ $products['product_weight'] }}" @else value="{{ old('product_discount') }}" @endif> </div>
										<div class="mb-3">
											<label for="product_color" class="form-label">Product Color</label>
											<input type="text" class="form-control" id="product_color" name="product_color" placeholder="Enter Product Color" @if (!empty($products[ 'product_color'])) value="{{ $products['product_color'] }}" @else value="{{ old('product_color') }}" @endif> </div>

                                        {{-- <div class="mb-3">
                                                <label for="offer_price" class="form-label">Offer Price</label>
                                                <input type="number" class="form-control" id="offer_price" name="offer_price" placeholder="Enter Offer Price"  @if (!empty($products[ 'offer_price'])) value="{{  ($products['offer_price']) }}" @else value="{{ old('offer_price') }}" @endif> </div> --}}

                                        <div class="mb-3">
											<label for="product_discount" class="form-label">Product Discount (%)</label>
											<input type="number" class="form-control" id="product_discount" name="product_discount" placeholder="Enter Product Discount" @if (!empty($products[ 'product_discount'])) value="{{ $products['product_discount'] }}" @else value="{{ old('product_discount') }}" @endif> </div>

                                        <div class="mb-3">
                                            <label for="product_url" class="form-label">Product URL</label>
                                            <input type="text" class="form-control" id="product_url" name="product_url"
                                             @if(!empty($products['product_url'])) value="{{ $products['product_url'] }}" @else value = "{{ old('product_url')}}" @endif >
                                        </div>

                                        <div class="mb-3">
                                            <label for="is_featured" class="form-check-label">Featured Items</label>
                                            <input type="checkbox" class="form-check-input"  name="is_featured" id="is_featured" value="Yes"  @if (!empty($products['is_featured']) && $products['is_featured'] == "Yes") checked=""  @endif>

                                           &nbsp;&nbsp;
                                           <label for="is_bestseller" class="form-check-label">Best Seller</label>
                                          <input type="checkbox" class="form-check-input" name="is_bestseller" id="is_bestseller" value="Yes"  @if (!empty($products['is_bestseller']) && $products['is_bestseller'] == "Yes") checked=""  @endif>


                                          &nbsp;&nbsp;
                                          <label for="trending" class="form-check-label">Trending</label>
                                         <input type="checkbox" class="form-check-input" name="trending" id="trending" value="Yes"  @if (!empty($products['trending']) && $products['trending'] == "Yes") checked=""  @endif>

                                        </div>
									</div>
								</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h4 class="card-title mb-3">Product Image (Recommended Size : 1000*1000)</h4>
							<div class="fallback">
								<input name="product_image" type="file" multiple  /> </div> @if (!empty($products['product_image']))
							<div class="dz-message needsclick text-center"> <img src="{{ url('front/images/product_images/medium/' . $products['product_image']) }}" alt="ProductImage" width="400px;" height="400px"> </div>
							<div class="text-sm-end">
								<a href="javascript:void(0)" module="product-image" moduleid="{{ $products['id'] }}" class="text-danger confirmDelete">
									<button type="button" class="btn btn-danger btn-rounded waves-effect waves-light"><i class="far fa-trash-alt me-1"></i> Delete Image</button>
								</a>
							</div> @else
							<div class="dz-message needsclick">
								<div class="mb-3"> <i class="display-4 text-muted bx bxs-cloud-upload"></i> </div>
								<h4>Drop files here or click to upload.</h4> </div> @endif </div>
					</div>
					<!-- end card-->
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Meta Data</h4>
							<p class="card-title-desc">Fill all information below</p>
							<div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<label for="meta_title" class="form-label"> Meta Title</label>
										<input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta title"  @if (!empty($products[ 'meta_title'])) value="{{ $products['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif> </div>
									<div class="mb-3">
										<label for="meta_keyword">Meta Keywords</label>
										<input id="meta_keyword" name="meta_keyword" type="text" class="form-control" placeholder="Enter Meta Keyword"  @if (!empty($products[ 'meta_keyword'])) value="{{ $products['meta_keyword'] }}" @else value="{{ old('meta_keyword') }}" @endif> </div>
								</div>
								<div class="col-sm-6">
									<div class="mb-3">
										<label for="meta_description">Meta Description</label>
										<textarea class="form-control" id="meta_description" rows="5" name="meta_description" placeholder="Enter Meta Description" > @if (!empty($products['meta_description'])) {{ $products['meta_description'] }} @else {{ old('meta_description') }} @endif </textarea>
									</div>


                                    {{-- <div class="mb-3">
                                        <label for="trending" class="form-label">Trending</label>
                                       <input type="checkbox" name="trending" id="trending" value="Yes"  @if (!empty($products['trending']) && $products['trending'] == "Yes") checked=""  @endif>
                                    </div> --}}
								</div>
							</div>
                            {{-- @if ($product_count == $seller_plan->plan_limit)

                               <div class="alert alert-warning" role="alert">
                                <strong>You have reached at your limits</strong>
                               </div>
                               <div class="d-flex flex-wrap gap-2">
								<button type="submit" class="btn btn-primary w-md waves-effect waves-light">Save</button>
                                <button class="btn btn-secondary w-md waves-effect waves-light mx-2" type="reset">Cancel</button>
							</div>
                            @else

                            @endif --}}
                            <div class="d-flex flex-wrap gap-2">
								<button type="submit" class="btn btn-primary w-md waves-effect waves-light">Save</button>
                                <button class="btn btn-secondary w-md waves-effect waves-light mx-2" type="reset">Cancel</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- end row -->
		</div>
		<!-- container-fluid -->
	</div>
	<!-- End Page-content -->
@endsection
