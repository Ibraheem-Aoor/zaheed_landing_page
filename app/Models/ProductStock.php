<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    /**
     * is_publised used as flag for product stock being approved or not to be published on user layer.
     * is_selected used as flag for product stock to determine if seller is selecting it as an offer or not.
     */
    protected $fillable = ['product_id', 'variant', 'sku', 'price', 'qty', 'image', 'is_selected', 'is_published'];
    //
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function wholesalePrices()
    {
        return $this->hasMany(WholesalePrice::class);
    }
}
