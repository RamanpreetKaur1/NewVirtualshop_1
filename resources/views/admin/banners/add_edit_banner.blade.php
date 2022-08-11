@extends('admin.layout.layout') @section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<div class="col-lg-12">
				<div class="text-sm-end mb-3">
					<a href="{{ url('admin/banners') }}">
						<button type="button" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="bx bx-arrow-back me-1"></i> Back</button>
					</a>
				</div>
			</div>
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
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
							<form class="form-horizontal" @if (empty($banner[ 'id'])) action="{{ url('admin/add-edit-banner') }}" @else action="{{ url('admin/add-edit-banner/' . $banner['id']) }}" @endif method="POST" enctype="multipart/form-data"> @csrf
								<div class="row">
									<div class="col-sm-6">
                                        <div class="mb-3 form-group">
                                            <label for="type" class="form-label">Banner Type</label>
                                            <select name="type" id="type" class="form-control" required>
                                                <option value="">Select</option>
                                                <option @if (!empty($banner[ 'type']) && $banner[ 'type']=="Slider" ) selected="" @endif value="Slider">Slider</option>
                                                <option @if (!empty($banner[ 'type']) && $banner[ 'type']=="Fix" ) selected="" @endif value="Fix">Fix</option>
                                            </select>
                                        </div>
										<div class="mb-3">
											<label for="link" class="form-label">Banner Link</label>
											<input type="text" class="form-control" id="link" name="link" @if (!empty($banner[ 'link'])) value="{{ $banner['link'] }}" @else value="{{ old('link') }}" @endif> </div>
									</div>
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="alt" class="form-label">Banner Alternate Text </label>
											<input type="text" class="form-control" id="alt" name="alt" @if (!empty($banner[ 'alt'])) value="{{ $banner['alt'] }}" @else value="{{ old('alt') }}" @endif> </div>
										<div class="mb-3">
											<label for="title" class="form-label">Banner Title</label>
											<input type="text" class="form-control" id="title" name="title" @if (!empty($banner[ 'title'])) value="{{ $banner['title'] }}" @else value="{{ old('title') }}" @endif> </div>
									</div>
								</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
                            {{-- <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body"> --}}
                                        <h4 class="card-title mb-3">Banner Image</h4>
                                        <div class="fallback mb-4">
                                            <input name="image" type="file" multiple /> </div> @if (!empty($banner['image']))
                                        <div class="dz-message needsclick text-center"> <img src="{{ url('front/images/banner_images/'.$banner['image']) }}" alt="bannerImage" width="auto" height="200px"> </div> @else
                                        <div class="dz-message needsclick">
                                            <div class="mb-3"> <i class="display-4 text-muted bx bxs-cloud-upload"></i> </div>
                                        </div> @endif
                                     {{-- </div>
                                </div>
                            </div> --}}
                            <!-- end card-->
							<div class="d-flex flex-wrap gap-2 mt-5">
								<button type="submit" class="btn btn-primary w-md waves-effect waves-light">Save </button>
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
</div>
<!-- End Page-content -->@endsection
