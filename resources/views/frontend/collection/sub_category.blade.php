@extends('frontend.layout.layout') @section('content')
@section('title')
    Collection | subcategory
@endsection


<div class="main-content">
    <div class="page-content">
        <div class="container">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Shop by Sub category</h2>
                        <hr>
                        <div class="row">
                            @foreach ($subcategories as $subcategory)
                                <div class="col-md-6 mx-3 col-xl-3">
                                    <a href="{{ url('collection/'.$subcategory->collection_section->section_url.'/'.$subcategory->category_url) }}">
                                        <div class="card  shadow-lg p-3 mb-5 bg-white rounded">
                                            <img class="card-img-top img-fluid"
                                                src="{{ asset('front/images/category_images/' . $subcategory->category_image) }}"
                                                alt="subcategory Image">
                                            <div class="card-body">
                                                <p class="card-text text-center">{{ $subcategory->category_name }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        @endsection
