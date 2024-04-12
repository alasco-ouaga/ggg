<?php

namespace App\Models;

use Botble\RealEstate\Models\Account;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meeting extends Model
{
    use HasFactory;
    protected $table = 'meetings';

    protected $fillabe = [
        "agent_id",
        "agent_first_name",
        "agent_last_name",
        "account_id",
        "motif",
        "mode",
        "tool",
        "link",
        "date",
        "time",
        "locality",
        "comment",
        "created_at",
        "updated_at",
    ];

    
    public function account() : BelongsTo
    {
        return $this->belongsTo(Account::class,"account_id");
    }

}
