@extends('layouts.admin')

@section('content')
    <div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
            <div class="mb-6">
                <h2 class="mb-0 text-heading fs-22 lh-15">Add new property
                </h2>
                <p class="mb-1">Please fill in the property details below..</p>
            </div>
            <div class="collapse-tabs new-property-step">
                <ul class="nav nav-pills border py-2 px-3 mb-6 d-none d-md-flex mb-6" role="tablist">
                    <li class="nav-item col">
                        <a class="nav-link active bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block" id="description-tab" data-toggle="pill" data-number="1." href="#description" role="tab" aria-controls="description" aria-selected="true"><span class="number">1.</span> Description</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block" id="media-tab" data-toggle="pill" data-number="2." href="#media" role="tab" aria-controls="media" aria-selected="false"><span class="number">2.</span> Media</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block" id="location-tab" data-toggle="pill" data-number="3." href="#location" role="tab" aria-controls="location" aria-selected="false"><span class="number">3.</span> Location</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block" id="detail-tab" data-toggle="pill" data-number="4." href="#detail" role="tab" aria-controls="detail" aria-selected="false"><span class="number">4.</span> Detail</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block" id="amenities-tab" data-toggle="pill" data-number="5." href="#amenities" role="tab" aria-controls="amenities" aria-selected="false"><span class="number">5.</span> Amenities</a>
                    </li>
                </ul>
                <div class="tab-content shadow-none p-0">
                    <form method="post" action="{{ route('admin.property.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div id="collapse-tabs-accordion">
                            <div class="tab-pane tab-pane-parent fade show active px-0" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0" id="heading-description">
                                        <h5 class="mb-0">
                                            <button class="btn btn-lg collapse-parent btn-block border shadow-none" data-toggle="collapse" data-number="1." data-target="#description-collapse" aria-expanded="true" aria-controls="description-collapse">
                                                <span class="number">1.</span> Description
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="description-collapse" class="collapse show collapsible" aria-labelledby="heading-description" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Property
                                                                Description</h3>

                                                            <br><br>
                                                            <div class="form-group">
                                                                <label for="title" class="text-heading">Title <span class="text-muted">(mandatory)</span></label>
                                                                <input type="text" required class="form-control form-control-lg border-0" id="title" name="title">
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <label for="description-01" class="text-heading">Description</label>
                                                                <textarea  class="form-control border-0" rows="5" name="description" id="description-01"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Property
                                                                Price</h3>
                                                            <br>
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-12 col-lg-12 col-xxl-12 px-2">
                                                                    <div class="form-group">
                                                                        <label for="price" class="text-heading">Price in ₦ <span class="text-muted">(only numbers)</span></label>
                                                                        <input type="number" class="form-control form-control-lg border-0" id="price" name="price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Select
                                                                Category</h3>
                                                            <br>
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-12 col-lg-12 col-xxl-12 px-2 mb-4 mb-md-0">
                                                                    <div class="form-group mb-0">
                                                                        <label for="category" class="text-heading">Category</label>
                                                                        <select class="form-control border-0 shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" id="category" name="property_type">
                                                                            <option value="1">For Sale</option>
                                                                            <option value="2">For Rent</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button class="btn btn-lg btn-primary next-button">Next step
                                                    <span class="d-inline-block ml-2 fs-16"><i class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tab-pane-parent fade px-0" id="media" role="tabpanel" aria-labelledby="media-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0" id="heading-media">
                                        <h5 class="mb-0">
                                            <button class="btn btn-lg collapse-parent btn-block border shadow-none" data-toggle="collapse" data-number="2." data-target="#media-collapse" aria-expanded="true" aria-controls="media-collapse">
                                                <span class="number">2.</span> Media
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="media-collapse" class="collapse collapsible" aria-labelledby="heading-media" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Upload photos
                                                                of your property</h3>
                                                            <br>
                                                            <div class="images">

                                                                <div class="pic">
                                                                    add
                                                                </div>
                                                                <input class="input-fields" onchange="processInputRequests()" type="file" name="uploads[]" hidden>

                                                            </div>
                                                            <div id="input-fields">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="#" class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i class="fal fa-long-arrow-left"></i></span>Prev step
                                                </a>
                                                <button class="btn btn-lg btn-primary next-button mb-3">Next step
                                                    <span class="d-inline-block ml-2 fs-16"><i class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tab-pane-parent fade px-0" id="location" role="tabpanel" aria-labelledby="location-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0" id="heading-location">
                                        <h5 class="mb-0">
                                            <button class="btn btn-block collapse-parent collapsed border shadow-none" data-toggle="collapse" data-number="3." data-target="#location-collapse" aria-expanded="true" aria-controls="location-collapse">
                                                <span class="number">3.</span> Location
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="location-collapse" class="collapse collapsible" aria-labelledby="heading-location" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Listing
                                                                Location</h3>
                                                            <p class="card-text mb-5">
                                                                Kindly provide the location details of your property
                                                            </p>
                                                            <div class="form-group">
                                                                <label for="address" class="text-heading">Address</label>
                                                                <input type="text" class="form-control form-control-lg border-0" id="address" required name="address">
                                                            </div>
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="state" class="text-heading">Country /
                                                                            State</label>
                                                                        <input type="text" class="form-control form-control-lg border-0" id="state" required name="state">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="city" class="text-heading">City</label>
                                                                        <input type="text" class="form-control form-control-lg border-0" required id="city" name="city">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row mx-n2">

                                                                <div class="col-md-12 col-lg-12 col-xxl-12 px-2">
                                                                    <div class="form-group">
                                                                        <label for="zip" class="text-heading">Zip</label>
                                                                        <input type="text" class="form-control form-control-lg border-0" id="zip" name="zip">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-6 text-heading fs-22 lh-15">Place the
                                                                listing pin on the map
                                                            </h3>
                                                            <div id="map" class="mapbox-gl map-point-animate mb-6" style="height: 296px" data-mapbox-access-token="pk.eyJ1IjoiZHVvbmdsaCIsImEiOiJjanJnNHQ4czExMzhyNDVwdWo5bW13ZmtnIn0.f1bmXQsS6o4bzFFJc8RCcQ" data-mapbox-options='{"center":[-73.981566, 40.739011],"setLngLat":[-73.981566, 40.739011]}' data-mapbox-marker='[{"position":[-73.981566, 40.739011],"className":"marker","backgroundImage":"images/googlle-market-01.png","backgroundRepeat":"no-repeat","width":"32px","height":"40px"}]'></div>
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group mb-md-0">
                                                                        <label for="latitude" class="text-heading">Latitude </label>
                                                                        <input type="text" class="form-control form-control-lg border-0" id="latitude" name="latitude">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group mb-md-0">
                                                                        <label for="longitude" class="text-heading">Longitude</label>
                                                                        <input type="text" class="form-control form-control-lg border-0" id="longitude" name="longitude">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="#" class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i class="fal fa-long-arrow-left"></i></span>Prev step
                                                </a>
                                                <button class="btn btn-lg btn-primary next-button mb-3">Next step
                                                    <span class="d-inline-block ml-2 fs-16"><i class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tab-pane-parent fade px-0" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0" id="heading-detail">
                                        <h5 class="mb-0">
                                            <button class="btn btn-block collapse-parent collapsed border shadow-none" data-toggle="collapse" data-number="4." data-target="#detail-collapse" aria-expanded="true" aria-controls="detail-collapse">
                                                <span class="number">4.</span> Detail
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="detail-collapse" class="collapse collapsible" aria-labelledby="heading-detail" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="card mb-6">
                                                <div class="card-body p-6">
                                                    <h3 class="card-title mb-0 text-heading fs-22 lh-15">Listing Detail</h3>
                                                    <p class="card-text mb-5">
                                                        Please provide some details about the property
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="size-in-ft" class="text-heading">Size in ft <span class="text-muted">(only numbers)</span></label>
                                                                <input type="text" class="form-control form-control-lg border-0" id="size-in-ft" name="size">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="room" class="text-heading">Rooms</label>
                                                                <input type="text" class="form-control form-control-lg border-0" id="room" name="rooms">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="bedrooms" class="text-heading">Bedrooms</label>
                                                                <input type="text" class="form-control form-control-lg border-0" id="bedrooms" name="bedrooms">
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="bathrooms" class="text-heading">Bathrooms</label>
                                                                <input type="text" class="form-control form-control-lg border-0" id="bathrooms" name="bathrooms">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="garages" class="text-heading">Garages</label>
                                                                <input type="text" class="form-control form-control-lg border-0" id="garages" name="garages">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="garage-size" class="text-heading">Garage size</label>
                                                                <input type="text" class="form-control form-control-lg border-0" id="garage-size" name="garage_size">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="year-built" class="text-heading">Year built <span class="text-muted">(numeric)</span></label>
                                                                <input type="text" class="form-control form-control-lg border-0" id="year-built" name="year_built">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="available-from" class="text-heading">Available from
                                                                    <span class="text-muted">(date)</span></label>
                                                                <input type="date" class="form-control form-control-lg border-0" id="available-from" name="available_from">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="floors-no" class="text-heading">Floors no</label>
                                                                <input type="text" class="form-control form-control-lg border-0" id="floor_no" name="floor_no">

                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="#" class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i class="fal fa-long-arrow-left"></i></span>Prev step
                                                </a>
                                                <button class="btn btn-lg btn-primary next-button mb-3">Next step
                                                    <span class="d-inline-block ml-2 fs-16"><i class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tab-pane-parent fade px-0" id="amenities" role="tabpanel" aria-labelledby="amenities-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0" id="heading-amenities">
                                        <h5 class="mb-0">
                                            <button class="btn btn-block collapse-parent collapsed border shadow-none" data-toggle="collapse" data-number="5." data-target="#amenities-collapse" aria-expanded="true" aria-controls="amenities-collapse">
                                                <span class="number">5.</span> Amenities
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="amenities-collapse" class="collapse collapsible" aria-labelledby="heading-amenities" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="card mb-6">
                                                <div class="card-body p-6">
                                                    <h3 class="card-title mb-0 text-heading fs-22 lh-15">Listing Detail</h3>
                                                    <p class="card-text mb-5">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit</p>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-3">
                                                            <ul class="list-group list-group-no-border">
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="features[]" value="Attic" id="attic">
                                                                        <label class="custom-control-label" for="attic">Attic</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="features[]" value="Basketball court" id="basketball-court">
                                                                        <label class="custom-control-label" for="basketball-court">Basketball court</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" value="Doorman" name="features[]" id="doorman">
                                                                        <label class="custom-control-label" for="doorman">Doorman</label>
                                                                    </div>
                                                                </li>


                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <ul class="list-group list-group-no-border">
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" value="Private space" name="features[]" id="private-space">
                                                                        <label class="custom-control-label" for="private-space">Private
                                                                            space</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" value="Sprinklers" name="features[]" id="sprinklers">
                                                                        <label class="custom-control-label" for="sprinklers">Sprinklers</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" value="Wine cellar" name="features[]" id="wine-cellar">
                                                                        <label class="custom-control-label" for="wine-cellar">Wine
                                                                            cellar</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <ul class="list-group list-group-no-border">
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" value="Front yard" class="custom-control-input" name="features[]" id="front-yard">
                                                                        <label class="custom-control-label" for="front-yard">Front
                                                                            yard</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" value="Lake view"  name="features[]" id="lake-view">
                                                                        <label class="custom-control-label" for="lake-view">Lake
                                                                            view</label>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item px-0 pt-0 pb-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" value="Ocean view" name="features[]" id="ocean-view">
                                                                        <label class="custom-control-label" for="ocean-view">Ocean
                                                                            view</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="#" class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i class="fal fa-long-arrow-left"></i></span>Prev step
                                                </a>
                                                <button class="btn btn-lg btn-primary mb-3" type="submit">Submit property
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
