<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function files()
    {
        return $this->hasMany(PropertyImage::class, 'property_id');
    }

    function randomFileKey(){
        return array_rand($this->files()->orderBy('id', 'desc')->get()->toArray(), 1);
    }

    function fileArray()
    {
        return $this->files()->orderBy('id', 'desc')->get()->toArray();
    }

    function randomFile(){
        return $this->fileArray()[$this->randomFileKey()];
    }

    public function amenities()
    {
        return $this->hasMany(PropertyAmenity::class, 'property_id');
    }

}
