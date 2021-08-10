<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertiesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(Request $request){
        $this->validate($request, [
            'title' => 'required|min:3',
            'description' => ['required', 'string', 'min:3'],
            'price' => ['required'],
            'property_type' => ['required', 'numeric'],
            'address' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'zip' => ['required'],
            'size' => ['required'],
            'rooms' => ['required'],
            'bedrooms' => ['required'],
            'bathrooms' => ['required'],
            'garages' => ['required'],
            'garage_size' => ['required'],
            'year_built' => ['required'],
            'available_from' => ['required'],
            'floor_no' => ['required'],
            'features' => ['required', 'array'],
            'features.*' => ['required', 'string'],
            'uploads' => ['required', 'array'],
            'uploads.*' => ['required', 'file', 'mimes:jpeg,jpg,png']
        ]);

        $files = $request->uploads;
        $amenities = $request->features;
        $property = Property::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'size' => $request->size,
            'address' => $request->address,
            'country' => $request->state,
            'city' => $request->city,
            'zip_code' => $request->zip,
            'rooms' => $request->rooms,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'year_built' => $request->year_built,
            'available_from' => $request->available_from,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,
            'floors_count' => $request->floors_no,
            'apartment_type' => $request->property_type
        ]);

        foreach($amenities as $amenity){
            PropertyAmenity::create([
                'property_id' => $property->id,
                'amenity' => $amenity
            ]);
        }
        foreach($files as $file){

            $file_name = $file->getClientOriginalName();
            $file_type = $file->getClientOriginalExtension();
            Storage::disk('public_uploads')->putFileAs('uploads/', $file, $file_name);
            PropertyImage::create([
                'property_id' => $property->id,
                'file_name' => $file_name,
                'file_type' => $file_type
            ]);
        }

        return back()->with('success', 'Property has been created successfully!');
    }

    public function lists()
    {
        $properties = Property::orderBy('id', 'desc')->paginate(20);
        return view('property.admin.lists', compact('properties'));
    }

    public function viewProperty(Property $property)
    {
        return view('property.view', compact('property'));
    }


}
