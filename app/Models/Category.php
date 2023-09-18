<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\App as FacadesApp;

class Category extends Model
{
    protected $guarded = [];
    protected $with = ['category_translations'];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? FacadesApp::getLocale() : $lang;
        $category_translation = $this->category_translations->where('lang', $lang)->first();
        return $category_translation != null ? $category_translation->$field : $this->$field;
    }

    public function category_translations(){
    	return $this->hasMany(CategoryTranslation::class);
    }

    public function products(){
    	return $this->hasMany(Product::class);
    }

    public function classified_products(){
    	return $this->hasMany(CustomerProduct::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    function brands() {
        return $this->belongsToMany(Brand::class,'shop_category_has_brands');
    }

    public function shops() : BelongsToMany
    {
        return $this->belongsToMany(Shop::class, 'shop_sub_categories')
            ->withTimestamps()
            ->withPivot('is_published');
    }




    function best_sale_product() {

        return $this->hasOne(Product::class)->physical()->where('type','child')->where('status','active')
        ->whereHas('stocks',function($query){
            $query->where('qty','>',0)->where('is_published',1);
        })->orderByDesc('num_of_sale');
    }


    public function scopeParent($query)
    {
        return $query->whereParentId(0);
    }



}
