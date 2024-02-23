<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramingSearch extends Model
{
    use HasFactory;
    
    protected $table = "programming_searchs";

    protected $fillable = [
        'min_price',
        'max_price',
        'type_name',
        'city_name',
        'find',
        'number_bedroom',
        'number_bathroom',
        'number_floor',
        'custumer_id',
        'category_id',
        'created_at', 
        'updated_at'   
    ];
}
