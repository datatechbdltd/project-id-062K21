@extends('layouts.admin.master')
@push('title') Edit Package @endpush
@push('style')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush
@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Package</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Edit Package</a>
                        </li>

                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->
                <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Actions</a>
                <!--end::Actions-->
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                    <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-success svg-icon-2x">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
                        <!--begin::Navigation-->
                        <ul class="navi navi-hover">
                            <li class="navi-header font-weight-bold py-4">
                                <span class="font-size-lg">Choose Label:</span>
                                <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                            </li>
                            <li class="navi-separator mb-3 opacity-70"></li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-success">Customer</span>
                                </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-danger">Partner</span>
                                </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-primary">Member</span>
                                </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-dark">Staff</span>
                                </span>
                                </a>
                            </li>
                            <li class="navi-separator mt-3 opacity-70"></li>
                            <li class="navi-footer py-4">
                                <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                    <i class="ki ki-plus icon-sm"></i>Add new</a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Edit Package Form</h3>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('package.update', $package->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="service">Services<span class="text-danger">*</span></label>
                                    <select class="form-control" id="service" name="service">
                                        <option value="" style="display: none" selected>Select Service</option>
                                        @foreach($services as $service)
                                          <option value="{{$service->id}}"  @if($package->service_id == $service->id) selected @endif>{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('service')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Name
                                        <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" value="{{$service->name}}" class="form-control" placeholder="Enter Name" />
                                    @error('name')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Price
                                        <span class="text-danger">*</span></label>
                                    <input type="number" value="{{$package->price}}" name="price" id="price" class="form-control" min="1" step="0.01"  placeholder="Enter price" />
                                    @error('price')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="" class="description">{{$package->description}}</textarea>
                                    @error('description')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Offer Percent
                                        <span class="text-danger">*</span></label>
                                    <input value="{{$package->offer_percent}}"  type="number" name="offer_percent" id="offer_percent" class="form-control" min="1"  placeholder="Enter offer percent" />
                                    @error('offer_percent')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Color
                                        <span class="text-danger">*</span></label>
                                    <input class="form-control" value="{{$package->color}}" name="color" type="color" id="example-color-input">
                                    @error('color')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!--begin: Code-->
                                <div class="example-code mt-10">
                                    <div class="example-highlight">
                                        <pre style="height:400px"></pre>
                                    </div>
                                </div>
                                <!--end: Code-->
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary mr-2">Update</button>
                                <a href="{{route('service.index')}}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->

                </div>
            </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@push('script')
    <script>
        $('.description').summernote({
            placeholder: 'Write long Description',
            tabsize: 2,
            height: 220,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endpush

