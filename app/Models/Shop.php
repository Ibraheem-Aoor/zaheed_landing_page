<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Throwable;

class Shop extends Model
{


    public function scopeNear($query, $coordinates, $has_filter = false)
    {

        $coordinates['latitude'] = request()->header('latitude');
        $coordinates['longitude'] = request()->header('longitude');
        $distance = 'ST_Distance_Sphere(point(longitude, latitude), point(  ' . $coordinates['longitude'] . ', ' . $coordinates['latitude'] . ' )  ) * .001 < ' . $coordinates['distance'];
        $near = $query->whereHas('masterStore', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('banned', 0);
            });
        })
            ->where('is_active', 1)->where('layer', 'branch')
            ->whereHas('mainCategories')
            ->whereRaw($distance)->get()
            ->filter(function ($shop) {
                $users = [];
                $getBranchStaff = $shop->staffs->pluck('id');
                array_push($users, [$shop->user->id]);
                array_push($users, $getBranchStaff->toArray());
                $users = array_merge(...$users);

                $offers = Product::whereIn('published', [0, 1])->where('type', 'child')
                    ->whereIn('user_id', $users)->whereHas('stocks', function ($query) {
                        $query->where('qty', '>', 0)->where('is_published', '>', 0);
                    })->count() > 0;
                return $offers;
            });
        if ($has_filter) {
            return $near;
        } else {
            return $near->sortBy('distance');
        }
    }


    protected $with = ['user', 'shop_translations'];

    protected $append = ['distance'];

    protected $guarded = ['_token'];



    /**
     * Branch Name = Branch Parent Name. "No Need To Update Branch Name Anywhere"
     */
    public function getTranslation($field = '', $lang = false)
    {
        $field = $field == 'name' && $this->layer == 'branch' ? 'description' : $field;
        $lang = $lang == false ? App::getLocale() : $lang;
        $shop_translation = $this->shop_translations->where('lang', $lang)->first();
        return $shop_translation != null ? $shop_translation->$field : $this->$field;
    }

    public function shop_translations()
    {
        return $this->hasMany(ShopTranslation::class);
    }



    ######################## START SETTERS/GETTERS #######################

    public function getDistanceAttribute()
    {
        $request = request();
        $lat1 = $request->header('latitude');
        $lon1 = $request->header('longitude');


        $lat2 = $this->latitude;
        $lon2 = $this->longitude;

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        return round(($miles * 1.609344), 2);
    }

    /**
     * Bacn Acc Num = IBAN
     */
    public function getBankAccNoAttribute()
    {
        return @$this->attributes['iban'];
    }
    public function setBankAccNoAttribute($value)
    {
        return $this->bank_acc_no = $value;
    }


    public function getLogoAttribute()
    {
        return $this->layer == 'master' ? @$this->attributes['logo'] : @$this->masterStore?->attributes['logo'];
    }


    ######################## END SETTERS/GETTERS #######################




    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seller_package()
    {
        return $this->belongsTo(SellerPackage::class);
    }
    public function followers()
    {
        return $this->hasMany(FollowSeller::class);
    }

    public function branches(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }


    /**
     * Each Branch Belongs To One Master Store Only
     */
    public function masterStore(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }


    /**
     * Master Store User
     */
    public function getMasterStoreUser()
    {
        return $this->masterStore->user;
    }


    /**
     * Shop Sub Categories
     * is_published flag is used for filters and "on/off"
     */
    public function subCategories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'shop_sub_categories', 'shop_id', 'category_id')
            ->withTimestamps()
            ->withPivot('is_published');
    }


    /**
     * Shop Main Categories
     */
    public function mainCategories(): BelongsToMany
    {
        if ($this->layer === 'master') {
            return $this->belongsToMany(Category::class, 'shop_main_categories', 'shop_id', 'category_id')
                ->withTimestamps()
                ->withPivot('is_published');
        } else {
            return $this->belongsToMany(Category::class, 'shop_main_categories', 'shop_id', 'category_id', 'parent_id')
                ->withTimestamps()
                ->withPivot('is_published');
        }
    }


    /**
     * Get Active Branches Count
     */
    public function activeBranchesCount(): int
    {
        return $this->branches()->where('is_active', 1)->count();
    }

    /**
     * Get Inactive Branches Count
     */
    public function inactiveBranchesCount(): int
    {
        return $this->branches()->where('is_active', 0)->count();
    }


    public function scopeLayer($query, $layer)
    {
        return $query->whereLayer($layer);
    }

    /**
     * Get Encrypted Id .
     */
    public function getEncryptedtId()
    {
        return encrypt($this->id);
    }



    public function pickupPoints(): HasMany
    {
        return $this->hasMany(PickupPoint::class, 'shop_id');
    }



    /**
     * All Shop Pages
     */
    public function pages(): HasMany
    {
        return $this->hasMany(ShopPage::class, 'parent_id', 'shop_id');
    }

    /**
     * All Shop Pages Products
     */
    public function pageProducts(): HasManyThrough
    {
        return $this->hasManyThrough(Product::class, ProductPage::class, 'shop_id', 'id', 'id', 'product_id');
    }


    /**
     * Each Shop Has Many Staffs
     */
    public function staffs(): HasMany
    {
        return $this->hasMany(Staff::class, 'shop_id');
    }

    function offers()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get Master Store Total Staffs.
     */

    public function totalStaffs()
    {
        $total_staffs = $this->staffs()->count();
        foreach ($this->branches as $branch) {
            $total_staffs += $branch->staffs()->count();
        }
        return $total_staffs;
    }


    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }


    /**
     * All shop Commissions
     */
    public function commissions(): HasMany
    {
        return $this->hasMany(SellerCommission::class, 'shop_id')->orderByDesc('created_at');
    }

    /**
     * All shop Commissions
     */
    public function commission()
    {
        return $this->commissions->first();
    }

    /**
     * Each Shop Has Many Fav Brands "pivot Table"
     */public function favBrands(): HasMany
    {
        return $this->hasMany(ShopHasFavoriteBrand::class, 'shop_id');
    }

    public function directFavBrands(): HasManyThrough
    {
        return $this->hasManyThrough(
            Brand::class,
                // The target model you want to access
            ShopHasFavoriteBrand::class,
            // The intermediate model
            'shop_id',
            // Foreign key on the intermediate table
            'id',
            // Foreign key on the target table
            'id',
            // Local key on the current model
            'brand_id' // Local key on the intermediate table
        );
    }


    /**
     * Get All Shop Brands By His Categories "Brand Associated With Main Categories"
     */
    public function getAllBrands()
    {
        $shop_categories_ids = $this->mainCategories->pluck('id')->toArray();
        $brands_ids = ShopCategoryHasBrand::query()->whereIn('category_id', $shop_categories_ids)->pluck('brand_id');
        return Brand::whereIn('id', $brands_ids)->get();
    }

    // public function city()
    // {
    //     return $this->hasOne(City::class, 'id', 'city_id');
    // }


    /**
     * Get Branches Users Id
     */
    public function getBranchesUsersIds(): array
    {
        return $this->branches()->pluck('user_id')->toArray() ?? [];
    }


    /**
     * Orders "for Branch Only"
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id');
    }


    public function district()
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }



    public function getCategroiesNamesString()
    {
        try {
            $categories_names = [];
            foreach ($this->mainCategories as $category) {
                array_push($categories_names, $category->getTranslation('name'));
            }
            return implode(',', $categories_names);
        } catch (Throwable $e) {
            dd($e);
        }
    }


}
