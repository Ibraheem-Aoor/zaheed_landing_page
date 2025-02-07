<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function getTranslation($field = '', $lang = false)
    {
        $lang = $lang == false ? App::getLocale() : $lang;
        $feature_translations = $this->feature_translations->where('lang', $lang)->first();
        return $feature_translations != null ? $feature_translations->$field : $this->$field;
    }

    public function feature_translations()
    {
        return $this->hasMany(FeatureTranslation::class);
    }

    public function updateTranslations($reqeust)
    {
        $locales = ['sa', 'en'];
        foreach ($locales as $locale) {
            $locale_for_request  = $locale != 'en' ? 'ar': 'en';
            $name = 'name_' . $locale_for_request;
            FeatureTranslation::query()->updateOrCreate([
                'feature_id' => $this->id,
                'lang' => $locale,
            ], [
                'feature_id' => $this->id,
                'name' => $reqeust->$name,
                'lang' => $locale,
            ]);
        }
    }
}
