<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id' , 'lang' ,
        'name'  , 'address' ,
        'company_name' , 'description',
        'refund_policy',
    ];



    public function shop()
    {
        return $this->belongsTo(Shop::class , 'shop_id');
    }
}
