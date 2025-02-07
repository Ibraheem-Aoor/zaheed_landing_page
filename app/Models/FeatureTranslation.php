<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lang',
        'feature_id',
    ];
}
