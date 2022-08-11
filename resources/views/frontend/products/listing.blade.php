<?php
use App\Models\Section;
use App\Models\Product;

$sections = Section::sections();

?>
@extends('frontend.layout.layout') @section('content')
@section('title')
    Virtual shop
@endsection
<div class="main-content">

    <div class="page-content">
        <div class="container">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Products</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">V-shop</a></li>
                                <li class="breadcrumb-item active"><?php echo $categoryDetails['breadcrumbs'] ?></li>
                            </ol>
                        </div>

                    </div>
                    <p style="font-size: 11px;" class="text-muted">
                        {{ $categoryDetails['catDetails']['category_discription'] }}</p>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">

                            @foreach ($sections as $section)
                                @if (count($section['categories']) > 0)
                                    <div>
                                        <h4 class="font-size-14 mb-3">{{ $section['name'] }}</h4>
                                        <hr>
                                        @foreach ($section['categories'] as $category)
                                            <a href="{{ $category['category_url'] }}">
                                                <h5 class="font-size-14 mb-3">{{ $category['category_name'] }}</h5>
                                            </a>

                                            <ul class="list-unstyled product-list">
                                                @foreach ($category['subcategories'] as $subcategory)
                                                    <li><a href="{{ $subcategory['category_url'] }}"><i
                                                                class="mdi mdi-chevron-right me-1"></i>{{ $subcategory['category_name'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                            <h4 class="card-title mb-4">Filter</h4>
                            <form  id="sortProducts" name="sortProducts" class="form-horizontal span6">
                                <input type="hidden" name="category_url" id="category_url" value="{{ $category_url }}">
                                <div class="form-group">
                                    <label for="sort">Sort By </label>
                                    <select name="sort" id="sort" class="form-control">
                                        <option value="">Select</option>
                                        <option value="latest_products"   @if (!empty($_GET['sort']) && ($_GET['sort'] == "latest_products"))   selected="" @endif>Latest Products</option>
                                        <option value="product_name_a_z"  @if (!empty($_GET['sort']) && ($_GET['sort'] == "product_name_a_z"))   selected=""  @endif>Product Name A-Z</option>
                                        <option value="product_name_z_a"  @if (!empty($_GET['sort']) && ($_GET['sort'] == "product_name_z_a"))   selected=""  @endif>Product Name Z-A</option>
                                        <option value="lowest_price"      @if (!empty($_GET['sort']) && ($_GET['sort'] == "lowest_price"))   selected=""   @endif>Lowest Price</option>
                                        <option value="highest_price"     @if (!empty($_GET['sort']) && ($_GET['sort'] == "highest_price"))   selected=""  @endif>Highest Price</option>

                                    </select>
                                </div>
                            </form>
                            <div class="mt-4 pt-3">
                                <h5 class="font-size-14 mb-3">Price</h5>
                                <input type="text" id="pricerange">
                            </div>

                            <div class="mt-4 pt-3">
                                <h5 class="font-size-14 mb-3">Discount</h5>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="productdiscountCheck1">
                                    <label class="form-check-label" for="productdiscountCheck1">
                                        Less than 10%
                                    </label>
                                </div>

                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="productdiscountCheck2">
                                    <label class="form-check-label" for="productdiscountCheck2">
                                        10% or more
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                {{-- load products using ajax --}}
                <div class="col-lg-9 filter_products">
                    @include('frontend.products.ajax_listing')
                </div>
                {{-- end ajax --}}
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



</div>
@endsection
{{--
<style>
    .w-5{
      /* display: none; */
        width: 30px;
        height: 15px;
    }
</style> --}}
