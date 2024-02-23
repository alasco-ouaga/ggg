<?php

namespace App\Http\Controllers;

use Botble\RealEstate\Models\Property;
use Illuminate\Http\Request;

class new_api extends Controller
{
    public function test()
    {
        $property = Property::all();
        dd($property);
        // $property = new Property();
        // $property->name ="test" ;
        // $property->type ="" ;
        // $property->description ="" ;
        // $property->author_id = 12;
        // $property->author_type = "Botble\RealEstate\Models\Account";
        
        // // dd(asset("/storage/accounts/alassane/51400444b.jpg"));
        // $property->save();


        return ["test api"=>"ok"];
    }
}
