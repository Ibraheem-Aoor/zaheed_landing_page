<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'city_id',
        'lattidue',
        'longitude',
    ];

    protected $with = ['district_translations'];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $district_translations = $this->district_translations->where('lang', $lang)->first();
        return $district_translations != null ? $district_translations->$field : $this->$field;
    }

    public function district_translations(){
        return $this->hasMany(DistrictTranslation::class);
    }
}
