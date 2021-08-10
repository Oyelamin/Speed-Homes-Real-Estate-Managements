@extends('layouts.admin')
@section('content')
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
        <div class="d-flex flex-wrap flex-md-nowrap mb-6">
            <div class="mr-0 mr-md-auto">
                <h2 class="mb-0 text-heading fs-22 lh-15">My Properties<span class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2">{{ $properties->count() }}</span>
                </h2>
                <p>Lists of properties</p>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover bg-white border rounded-lg">
                <thead class="thead-sm thead-black">
                <tr>
                    <th scope="col" class="border-top-0 px-6 pt-5 pb-4">Listing title</th>
                    <th scope="col" class="border-top-0 pt-5 pb-4">Date Published</th>
                    <th scope="col" class="border-top-0 pt-5 pb-4">Country</th>
                    <th scope="col" class="border-top-0 pt-5 pb-4">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($properties as $property)
                        <tr class="shadow-hover-xs-2 bg-hover-white">
                            <td class="align-middle pt-6 pb-4 px-6">
                                <div class="media">
                                    <div class="w-120px mr-4 position-relative">
                                        <a href="{{ route('admin.property.view', ['property' => $property->id]) }}">
                                            <img src="{{ asset('uploads/'.$property->randomFile()['file_name']) }}" alt="Home in Metric Way">
                                        </a>
                                        @if($property->apartment_type == 1)
                                            <span class="badge badge-success position-absolute pos-fixed-top">for sale</span>
                                        @else
                                            <span class="badge badge-indigo position-absolute pos-fixed-top">for rent</span>
                                        @endif

                                    </div>
                                    <div class="media-body">
                                        <a href="{{ route('admin.property.view', ['property' => $property->id]) }}" class="text-dark hover-primary">
                                            <h5 class="fs-16 mb-0 lh-18">{{ $property->title }}</h5>
                                        </a>
                                        <p class="mb-1 font-weight-500">{{ $property->address }}</p>
                                        <span class="text-heading lh-15 font-weight-bold fs-17">₦{{ number_format($property->price) }}</span>
                                        <span class="text-gray-light">/month</span>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">{{ \Carbon\Carbon::parse($property->created_at)->format('jS M, Y') }}</td>

                            <td class="align-middle">{{ $property->country }}</td>
                            <td class="align-middle">
                                <a href="#" data-toggle="tooltip" title="Delete" class="d-inline-block fs-18 text-muted hover-primary"><i class="fal fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <nav class="mt-6">
            {{ $properties->links() }}
        </nav>
    </div>
@endsection
