<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class new_api extends Controller
{
    public function test()
    {
        return ["test api"=>"ok"];
    }
}
