<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Support\Facades\App as FacadesApp;

class Page extends Model
{
  public function getTranslation($field = '', $lang = false){
      $lang = $lang == false ? FacadesApp::getLocale() : $lang;
      $page_translation = $this->hasMany(PageTranslation::class)->where('lang', $lang)->first();
      return $page_translation != null ? $page_translation->$field : $this->$field;
  }

  public function page_translations(){
    return $this->hasMany(PageTranslation::class);
  }
}
