<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PartnerApplication extends Model
{
    use HasFactory;
    protected $guarded = ['token'];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
