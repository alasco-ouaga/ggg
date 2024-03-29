<?php

namespace App\Models;

use Botble\Location\Models\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{

    use HasFactory;

    protected $table = 'localities';

    protected $fillable = [
        "name",
        "city_id"
    ];

    public function city() : BelongsTo 
    {
        return $this->belongsTo(City::class,"city_id");
    }
}
