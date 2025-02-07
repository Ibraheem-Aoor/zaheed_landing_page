<?php

namespace App\Models;

use Illuminate\Support\Facades\App as FacadesApp;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['bankTranslations'];

    public function getTranslation($field = '', $lang = false) {
        $lang = !$lang ? FacadesApp::getLocale() : $lang;
        $bank_translation = $this->bankTranslations->where('lang', $lang)->first();
        return $bank_translation != null ? $bank_translation->$field : $this->$field;
    }

    public function bankTranslations(): HasMany
    {
        return $this->hasMany(BankTranslation::class, 'bank_id');
    }
}
