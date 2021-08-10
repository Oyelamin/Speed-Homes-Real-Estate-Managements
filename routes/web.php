<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $properties = \App\Models\Property::all();

    return view('welcome', compact('properties'));
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard', function () {
        $properties = \App\Models\Property::all();
        return view('dashboard', compact('properties'));
    })->name('dashboard');
    Route::get('/create-property', function()
    {
        return view('property.admin.create');
    })->name('admin.property.add');
    Route::get('/admin/properties', 'App\Http\Controllers\Admin\PropertiesController@lists')->name('admin.properties');
    Route::post('property-save', 'App\Http\Controllers\Admin\PropertiesController@create')->name('admin.property.save');
    Route::get('admin/property/{property}', 'App\Http\Controllers\Admin\PropertiesController@viewProperty')->name('admin.property.view');
    Route::get('/contacts', 'App\Http\Controllers\Admin\ContactsController@lists')->name('contact.lists');
});
Route::get('/property/{property}', 'App\Http\Controllers\PropertiesController@viewProperty')->name('property.view');
Route::post('contact', 'App\Http\Controllers\PropertiesController@contact')->name('contact');
