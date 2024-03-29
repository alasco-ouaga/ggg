<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use Botble\Location\Models\Country;
use Botble\Location\Models\State;
use Illuminate\Http\Request;

class LocalityController extends Controller
{
    public function getList(){
        $localities = Locality::all();
        return view("admin.locality.localities",compact("localities"));
    }

    public function satates_list($country_id){
        $states = State::where("country_id",$country_id)->get();
        return $states;
    }
}
