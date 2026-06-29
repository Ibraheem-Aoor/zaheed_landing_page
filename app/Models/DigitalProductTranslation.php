<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalProductTranslation extends Model
{
    use HasFactory;

    protected $table = 'digital_product_translations';
    protected $fillable = [
        'digital_product_id',
        'lang',
        'name',
        'description',
        'instructions',
        'terms',
    ];
}
