<?php

namespace App\Models;

use Botble\RealEstate\Models\Account;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramingSearch extends Model
{
    use HasFactory;
    
    protected $table = "programmingsearchs";

    protected $fillable = [
        'account_id',
        'type',
        'city',
        'city_id',
        'category',
        'category_id', 
        'min_price',
        'max_price',
        'number_bedroom',
        'number_bathroom',
        'number_floor',
        'found',
        'nb_found',
        'created_at', 
        'updated_at'   
    ];

    public function account() : BelongsTo 
    {
        return $this->belongsTo(Account::class,"account_id");
    }
}
