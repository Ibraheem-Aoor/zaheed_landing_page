<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Support\Facades\App as FacadesApp;

class Bank extends Model
{
    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? FacadesApp::getLocale() : $lang;
        $city_translation = $this->hasMany(BankTranslation::class)->where('lang', $lang)->first();
        return $city_translation != null ? $city_translation->$field : $this->$field;
    }

    public function bank_translations(){
       return $this->hasMany(BankTranslation::class);
    }

}
