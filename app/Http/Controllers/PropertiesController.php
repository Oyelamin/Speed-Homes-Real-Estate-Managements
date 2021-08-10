<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function viewProperty(Property $property)
    {
        return view('view_property', compact('property'));
    }

    public function contact(Request $request)
    {

        $this->validate($request, [
            'name' => ['bail', 'required', 'string', 'min:3'],
            'email' => ['bail', 'required', 'email'],
            'phone' => ['bail', 'required'],
            'content' => ['bail', 'required'],
            'property' => ['nullable', 'exists:properties,id']
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->content,
            'property_id' => $request->property ? $request->property : null
        ]);
        return back()->with('success', 'Your information has been received successfully. A response will be sent to you soon!');
    }
    //
}
