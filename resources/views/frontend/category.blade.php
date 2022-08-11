@extends('frontend.layout.layout') @section('content')
@section('title') All Categories @endsection


<div class="main-content">
	<div class="page-content">
		<div class="container">
			<div class="col-lg-12">
				{{-- <div class="card">
					<div class="card-body"> --}}
						{{-- <h2 class="card-title"> All Categories</h2> --}}
						<p class="card-title-desc"></p>

                        <div class="container">
                            <div class="row">
                                <h2>All Categories</h2>
                                    <hr class="my-4">

                                            @foreach ($categories as $category )
                                                <div class="col-md-6 col-xl-3">
                                                    <div class="card">
                                                        <a href="{{ url('view-category/'.$category->category_url) }}">
                                                            <div class="product-img position-relative">
                                                                @if ($category->category_discount > 0)
                                                                    <div class="avatar-sm product-ribbon">
                                                                        <span class="avatar-title rounded-circle  bg-primary">{{ $category->category_discount }}%</span>
                                                                    </div>
                                                                @endif
                                                                <img src="{{ asset('front/images/category_images/'.$category->category_image) }}" width="100px" alt="category Image"  class="card-img-top img-fluid p-2">

                                                                <div class="card-body">
                                                                    <div class="mt-1 text-center">
                                                                        <h6 class="mb-1 text-truncate"><a href="#" class="text-dark">{{ $category->category_name }}</a></h6>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </a>

                                                    </div>

                                                </div><!-- end col -->
                                            @endforeach


                            </div>
                        </div>
                    {{-- </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
