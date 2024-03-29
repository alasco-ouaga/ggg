<?php

namespace App\Http\Controllers;

use Botble\RealEstate\Models\Account;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function user_list(){
        return Account::all(); 
    }

    public function user_create(Request $request){
            return $request->user_id;
    }
}
