<?php

namespace App\Helpers;

use App\Models\Custumer;
use App\Models\Payment;
use App\Models\Role;
use App\Models\RoleUser;
use Botble\RealEstate\Models\Property;

class helper
{
    public function compte_properties(){
        return count(Property::all());
    }
}
