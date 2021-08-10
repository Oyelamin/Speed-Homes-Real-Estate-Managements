@extends('layouts.admin')
@section('content')
    <section class="pb-7 shadow-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb py-3">
                    <li class="breadcrumb-item fs-12 letter-spacing-087">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item fs-12 letter-spacing-087">
                        <a href="">Listing</a>
                    </li>
                    <li class="breadcrumb-item fs-12 letter-spacing-087 active">{{ $property->title }}</li>
                </ol>
            </nav>
            <div class="d-md-flex justify-content-md-between mb-1">
                <ul class="list-inline d-sm-flex align-items-sm-center mb-0">
                    <li class="list-inline-item badge badge-orange mr-2">Featured</li>
                    @if($property->apartment_type == 1)
                        <li class="list-inline-item badge badge-success mr-3">for sale</li>
                    @else
                        <li class="list-inline-item badge badge-primary mr-3">for rent</li>
                    @endif
                    <li class="list-inline-item mr-2 mt-2 mt-sm-0"><i class="fal fa-clock mr-1"></i>{{ $property->created_at->diffForHumans(null, true) }} ago</li>
                </ul>

            </div>
            <div class="d-md-flex justify-content-md-between mb-6">
                <div>
                    <h2 class="fs-35 font-weight-600 lh-15 text-heading">{{ $property->title }}</h2>
                    <p class="mb-0"><i class="fal fa-map-marker-alt mr-2"></i>{{ $property->address }}</p>
                </div>
                <div class="mt-2 text-md-right">
                    <p class="fs-22 text-heading font-weight-bold mb-0">₦{{ number_format($property->price) }}</p>
                    <p class="mb-0">{{ $property->size }}/SqFt</p>
                </div>
            </div>
            <div class="galleries position-relative">

                <div class="tab-content p-0 shadow-none">
                    <div class="tab-pane fade show active" id="image" role="tabpanel">
                        <div class="slick-slider dots-white arrow-inner" data-slick-options='{"slidesToShow": 1, "autoplay":false}'>
                            @foreach($property->files as $file)
                                <div class="box">
                                    <div class="item item-size-3-2">
                                        <div class="card p-0">
                                            <a href="{{ asset('uploads/'.$file->file_name) }}" class="card-img" data-gtf-mfp="true" data-gallery-id="03" style="background-image:url('{{ asset('uploads/'.$file->file_name) }}')">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="tab-pane fade" id="map-view" role="tabpanel">
                        <div id="map-01" style="height:620px;" class="mapbox-gl" data-mapbox-access-token="pk.eyJ1IjoiZHVvbmdsaCIsImEiOiJjanJnNHQ4czExMzhyNDVwdWo5bW13ZmtnIn0.f1bmXQsS6o4bzFFJc8RCcQ" data-mapbox-options='{"center":[-73.981566, 40.739011],"setLngLat":[-73.981566, 40.739011],"container":"map-01"}'></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="primary-content bg-gray-01 pt-7 pb-12">
        <div class="container">
            <div class="row">
                <article class="col-lg-8">
                    <section class="pb-8 px-6 pt-5 bg-white rounded-lg">
                        <h4 class="fs-22 text-heading mb-2">Description</h4>
                        <p class="mb-0 lh-214">{{ $property->description }}</p>
                    </section>

                    <section class="mt-2 pb-3 px-6 pt-5 bg-white rounded-lg">
                        <h4 class="fs-22 text-heading mb-6">Facts and Features</h4>
                        <div class="row">
                            <div class="col-lg-3 col-sm-4 mb-6">
                                <div class="media">
                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                        <svg class="icon icon-family fs-32 text-primary">
                                            <use xlink:href="#icon-family"></use>

                                        </svg>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Type</h5>
                                        <p class="mb-0 fs-13 font-weight-bold text-heading">
                                            @if($property->apartment_type == 1)
                                                FOR SALE
                                            @else
                                                FOR RENT
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 mb-6">
                                <div class="media">
                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                        <svg class="icon icon-year fs-32 text-primary">
                                            <use xlink:href="#icon-year"></use>
                                        </svg>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">year built</h5>
                                        <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $property->year_built }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-4 mb-6">
                                <div class="media">
                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                        <svg class="icon icon-price fs-32 text-primary">
                                            <use xlink:href="#icon-price"></use>
                                        </svg>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">SQFT</h5>
                                        <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $property->size }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 mb-6">
                                <div class="media">
                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                        <svg class="icon icon-bedroom fs-32 text-primary">
                                            <use xlink:href="#icon-bedroom"></use>
                                        </svg>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Bedrooms</h5>
                                        <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $property->bedrooms }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 mb-6">
                                <div class="media">
                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                        <svg class="icon icon-sofa fs-32 text-primary">
                                            <use xlink:href="#icon-sofa"></use>
                                        </svg>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">bathrooms</h5>
                                        <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $property->bathrooms }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 mb-6">
                                <div class="media">
                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                        <svg class="icon icon-Garage fs-32 text-primary">
                                            <use xlink:href="#icon-Garage"></use>
                                        </svg>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">GARAGE</h5>
                                        <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $property->garage }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <section class="mt-2 pb-6 px-6 pt-5 bg-white rounded-lg">
                        <h4 class="fs-22 text-heading mb-4">Additional Details</h4>
                        <div class="row">

                            <dl class="col-sm-6 mb-0 d-flex">
                                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Price</dt>
                                <dd>₦{{ number_format($property->price) }}</dd>
                            </dl>
                            <dl class="col-sm-6 mb-0 d-flex">
                                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Property type</dt>
                                <dd>
                                    @if($property->apartment_type == 1)
                                        FOR SALE
                                    @else
                                        FOR RENT
                                    @endif
                                </dd>
                            </dl>

                            <dl class="col-sm-6 mb-0 d-flex">
                                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Rooms</dt>
                                <dd>{{ $property->bedrooms + $property->bathrooms }}</dd>
                            </dl>
                            <dl class="col-sm-6 mb-0 d-flex">
                                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Bedrooms</dt>
                                <dd>{{ $property->bedrooms }}</dd>
                            </dl>
                            <dl class="col-sm-6 mb-0 d-flex">
                                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Size</dt>
                                <dd>{{ $property->size }}SqFt</dd>
                            </dl>
                            <dl class="col-sm-6 mb-0 d-flex">
                                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Bathrooms</dt>
                                <dd>{{ $property->bathrooms }}</dd>
                            </dl>
                            <dl class="col-sm-6 mb-0 d-flex">
                                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Garage</dt>
                                <dd>{{ $property->garage }}</dd>
                            </dl>

                            <dl class="col-sm-6 mb-0 d-flex">
                                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Garage size</dt>
                                <dd>{{ $property->garage_size }} SqFt</dd>
                            </dl>
                            <dl class="col-sm-6 mb-0 d-flex">
                                <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Year build</dt>
                                <dd>{{ $property->year_built }}</dd>
                            </dl>

                        </div>
                    </section>
                    <section class="mt-2 pb-7 px-6 pt-5 bg-white rounded-lg">
                        <h4 class="fs-22 text-heading mb-4">Offices Amenities</h4>
                        <ul class="list-unstyled mb-0 row no-gutters">
                            @foreach($property->amenities as $ame)
                                <li class="col-sm-3 col-6 mb-2"><i class="far fa-check mr-2 text-primary"></i>
                                    {{ $ame->amenity }}
                                </li>
                            @endforeach
                        </ul>
                    </section>

                </article>
                <aside class="col-lg-4 pl-xl-4 primary-sidebar sidebar-sticky" id="sidebar">
                    <div class="primary-sidebar-inner">
                        <div class="card mb-4">
                            <div class="card-body px-6 py-4 text-center">
{{--                                <a href="agent-details-1.html" class="d-block mb-2">--}}
{{--                                    <img src="images/agent-1.jpg" class="rounded-circle" alt="Oliver Beddows">--}}
{{--                                </a>--}}
                                <a href="agent-details-1.html" class="fs-16 lh-214 text-dark mb-0 font-weight-500 hover-primary">Oliver Beddows</a>
                                <p class="mb-0">Sales Excutive</p>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item fs-13 text-heading font-weight-500">4.8/5</li>
                                    <li class="list-inline-item fs-13 text-heading font-weight-500 mr-1">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item mr-0">
                                                <span class="text-warning fs-12 lh-2"><i class="fas fa-star"></i></span>
                                            </li>
                                            <li class="list-inline-item mr-0">
                                                <span class="text-warning fs-12 lh-2"><i class="fas fa-star"></i></span>
                                            </li>
                                            <li class="list-inline-item mr-0">
                                                <span class="text-warning fs-12 lh-2"><i class="fas fa-star"></i></span>
                                            </li>
                                            <li class="list-inline-item mr-0">
                                                <span class="text-warning fs-12 lh-2"><i class="fas fa-star"></i></span>
                                            </li>
                                            <li class="list-inline-item mr-0">
                                                <span class="text-warning fs-12 lh-2"><i class="fas fa-star"></i></span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="list-inline-item fs-13 text-gray-light">(67 reviews)</li>
                                </ul>
                                <a href="mailto:oliverbeddows@homeid.com" class="text-body">oliverbeddows@homeid.com</a>
                                <a href="tel:123-900-68668" class="text-heading font-weight-600 d-block mb-4">123 900
                                    68668</a>
                                <ul class="list-inline border-bottom border-top py-3 mb-5">
                                    <li class="list-inline-item mr-2">
                                        <a href="#" class="w-40px h-40 rounded-circle border text-body bg-hover-primary hover-white border-hover-primary d-flex align-items-center justify-content-center"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-2">
                                        <a href="#" class="w-40px h-40 rounded-circle border text-body bg-hover-primary hover-white border-hover-primary d-flex align-items-center justify-content-center"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-2">
                                        <a href="#" class="w-40px h-40 rounded-circle border text-body bg-hover-primary hover-white border-hover-primary d-flex align-items-center justify-content-center">
                                            <i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-2">
                                        <a href="#" class="w-40px h-40 rounded-circle border text-body bg-hover-primary hover-white border-hover-primary d-flex align-items-center justify-content-center"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                                <form>
                                    <div class="form-group mb-2">
                                        <label for="name" class="sr-only">Name</label>
                                        <input type="text" class="form-control form-control-lg border-0 shadow-none" id="name" placeholder="First Name, Last Name">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="email" class="sr-only">Email</label>
                                        <input type="text" class="form-control form-control-lg border-0 shadow-none" id="email" placeholder="Your email">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="phone" class="sr-only">Phone</label>
                                        <input type="text" class="form-control form-control-lg border-0 shadow-none" id="phone" placeholder="Your phone">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="message" class="sr-only">Message</label>
                                        <textarea class="form-control border-0 shadow-none" id="message"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-none">Request
                                        Info
                                    </button>
                                    <a href="listing-with-left-sidebar.html" class="d-flex align-items-center justify-content-center mt-4 text-heading hover-primary">
                                        <span class="badge badge-circle border fs-13 font-weight-bold  mr-2">5</span>
                                        <span class="font-weight-500 mr-2">Listed Properties</span>
                                        <span class="text-primary fs-16"><i class="far fa-long-arrow-right"></i></span>
                                    </a>
                                </form>
                            </div>
                        </div>

                    </div>
                </aside>
            </div>
        </div>
    </div>
    <section>
        <div class="d-flex bottom-bar-action bottom-bar-action-01 py-2 px-4 bg-gray-01 align-items-center position-fixed fixed-bottom d-sm-none">
            <div class="media align-items-center">
                <img src="images/irene-wallace.png" alt="Irene Wallace" class="mr-4 rounded-circle">
                <div class="media-body">
                    <a href="#" class="d-block text-dark fs-15 font-weight-500 lh-15">Irene Wallace</a>
                    <span class="fs-13 lh-2">Sales Excutive</span>
                </div>
            </div>
            <div class="ml-auto">
                <button type="button" class="btn btn-primary fs-18 p-2 lh-1 mr-1 mb-1 shadow-none" data-toggle="modal" data-target="#modal-messenger"><i class="fal fa-comment"></i></button>
                <a href="tel:(+84)2388-969-888" class="btn btn-primary fs-18 p-2 lh-1 mb-1 shadow-none" target="_blank"><i class="fal fa-phone"></i></a>
            </div>
        </div>
        <div class="modal fade" id="modal-messenger" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h4 class="modal-title text-heading" id="exampleModalLabel">Contact Form</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-6">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control form-control-lg border-0" placeholder="First Name, Last Name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="email" class="form-control form-control-lg border-0" placeholder="Your Email">
                        </div>
                        <div class="form-group mb-2">
                            <input type="tel" class="form-control form-control-lg border-0" placeholder="Your phone">
                        </div>
                        <div class="form-group mb-2">
                            <textarea class="form-control border-0" rows="4">Hello, I'm interested in Villa Called Archangel</textarea>
                        </div>
                        <div class="form-group form-check mb-4">
                            <input type="checkbox" class="form-check-input" id="exampleCheck3">
                            <label class="form-check-label fs-13" for="exampleCheck3">Egestas fringilla phasellus faucibus
                                scelerisque eleifend donec.</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Request Info</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
