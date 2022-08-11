@extends('frontend.layout.layout') @section('content')
@section('title')
    Collection | category
@endsection


<div class="main-content">
    <div class="page-content">
        <div class="container">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Shop by category</h2>
                        <hr>
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-md-6 mx-3 col-xl-3">
                                    <a href="{{ url('collection/'.$category->collection_section->section_url.'/'.$category->category_url) }}">
                                        <div class="card  shadow-lg p-3 mb-5 bg-white rounded">
                                            <img class="card-img-top img-fluid"
                                                src="{{ asset('front/images/category_images/' . $category->category_image) }}"
                                                alt="category Image">
                                            <div class="card-body">
                                                <p class="card-text text-center">{{ $category->category_name }}</p>
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
