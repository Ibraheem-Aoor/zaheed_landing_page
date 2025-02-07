<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App as FacadesApp;

class Product extends Model
{

    protected $guarded = ['choice_attributes'];

    protected $with = ['product_translations'];

    protected $appends= ['discounted_unit_price','product_varitions_details'];

    public function getTranslation($field = '', $lang = false)
    {
        $lang = $lang == false ? FacadesApp::getLocale() : $lang;

        //get parent translations for child product from catalog
        if($this->type==='child'){
            $parent_product =   $this->where('id',$this->parent_id)->first();
            $product_translations   =  $parent_product->product_translations->where('lang', $lang)->first() ?? $this->product_translations->where('lang', $lang)->first();
        }else{
            $product_translations = $this->product_translations->where('lang', $lang)->first();
        }

        return $product_translations != null ? $product_translations->$field : $this->$field;
    }

    public function product_translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->where('status', 1);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }



    public function flash_deal_product()
    {
        return $this->hasOne(FlashDealProduct::class);
    }

    public function bids()
    {
        return $this->hasMany(AuctionProductBid::class);
    }

    public function getDiscountedUnitPriceAttribute(){

        if($this->discount > 0 && $this->discount_type ){
            if($this->discount_type==='percent'){
                return $this->unit_price * (1 - $this->discount / 100);
            }
            elseif($this->discount_type==='amount'){
                return $this->unit_price - $this->discount;
            }
            return 0;
        }
    }

    /**
     *  Product Pages
     */
    public function pages() : BelongsToMany
    {
        return $this->belongsToMany(ShopPage::class, 'product_pages', 'product_id', 'shop_page_id')
            ->withPivot('shop_id')
            ->withTimestamps();
    }

    /**
     *  Product compaign  Pages which created by system admins not sellers.
     */
    public function compaignPages() : BelongsToMany
    {
        return $this->belongsToMany(CampaignPage::class, 'product_compaign_pages', 'product_id', 'compaign_page_id')
            ->withTimestamps()
            ->withPivot('shop_id');
    }

    public function getShopAttribute()
    {
        return $shop=Shop::where('user_id',$this->user_id)->first();
        // return $shop->description;
    }

    // public function shop(): HasOne
    // {
    //     return $this->hasOne(User::class, 'user_id', 'user_id');
    // }


    public function scopePhysical($query)
    {
        return $query->where('digital', 0);
    }

    public function scopeDigital($query)
    {
        return $query->where('digital', 1);
    }

    public function scopeChild($query) {
        return $query->where('type','child');
    }



    public function parentProduct()
    {
        return $this->belongsTo(self::class , 'parent_id');
    }

    public function childrenProducts()
    {
        return $this->hasMany(self::class , 'parent_id');
    }

    public function discounts() : HasMany
    {
        return $this->hasMany(ProductDiscount::class);
    }

    public function setCurrentStockAttribute($value)
    {
        $this->current_stock = !is_null($value) ? $value : 1;
    }

}
