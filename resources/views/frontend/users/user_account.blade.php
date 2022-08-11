@extends('frontend.layout.layout')  @section('title') Virtual Shop : Online Shopping Site in India @endsection
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h2 class="mb-sm-0 font-size-18">Your Account</h2>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Add Product</li>
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

                            <h4 class="card-title">Basic Information</h4>
                            <p class="card-title-desc">Fill all information below</p>

                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <input id="name" name="name" type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobile">Mobile</label>
                                            <input id="mobile" name="mobile" type="text" class="form-control">
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="manufacturerbrand">Manufacturer Brand</label>
                                            <input id="manufacturerbrand" name="manufacturerbrand" type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input id="price" name="price" type="text" class="form-control">
                                        </div> --}}
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="control-label">Category</label>
                                            <select class="form-control select2">
                                                <option>Select</option>
                                                <option value="FA">Fashion</option>
                                                <option value="EL">Electronic</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">Features</label>

                                            <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
                                                <option value="WI">Wireless</option>
                                                <option value="BE">Battery life</option>
                                                <option value="BA">Bass</option>
                                            </select>

                                        </div>
                                        <div class="mb-3">
                                            <label for="productdesc">Product Description</label>
                                            <textarea class="form-control" id="productdesc" rows="5"></textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                    <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Product Images</h4>

                            <form action="/" method="post" class="dropzone">
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>

                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                    </div>

                                    <h4>Drop files here or click to upload.</h4>
                                </div>
                            </form>
                        </div>

                    </div> <!-- end card-->

                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Meta Data</h4>
                            <p class="card-title-desc">Fill all information below</p>

                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="metatitle">Meta title</label>
                                            <input id="metatitle" name="productname" type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="metakeywords">Meta Keywords</label>
                                            <input id="metakeywords" name="manufacturername" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="metadescription">Meta Description</label>
                                            <textarea class="form-control" id="metadescription" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                    <button type="submit" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
</div>

@endsection
