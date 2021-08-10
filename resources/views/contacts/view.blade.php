@extends('layouts.admin')
@section('content')
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
        <div class="d-flex flex-wrap flex-md-nowrap mb-6">
            <div class="mr-0 mr-md-auto">
                <h2 class="mb-0 text-heading fs-22 lh-15">Request Informations<span class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2">{{ $contacts->count() }}</span>
                </h2>
                <p>Lists of contacts</p>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover bg-white border rounded-lg">
                <thead class="thead-sm thead-black">
                <tr>
                    <th scope="col" class="border-top-0 px-6 pt-5 pb-4">Name</th>
                    <th scope="col" class="border-top-0 pt-5 pb-4">Email</th>
                    <th scope="col" class="border-top-0 pt-5 pb-4">Phone</th>
                    <th scope="col" class="border-top-0 pt-5 pb-4">Message</th>
                    <th scope="col" class="border-top-0 pt-5 pb-4">Property</th>

                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr class="shadow-hover-xs-2 bg-hover-white">
                        <td class="align-middle pt-6 pb-4 px-6">
                            {{ $contact->name }}
                        </td>
                        <td class="align-middle">{{ $contact->email }}</td>

                        <td class="align-middle">{{ $contact->phone }}</td>
                        <td class="align-middle">
                            {{ $contact->content }}
                        </td>
                        <td class="align-middle">
                            @if($contact->property)
                                <a href="{{ route('admin.property.view', ['property' => $contact->property->id]) }}">View Property</a>
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
