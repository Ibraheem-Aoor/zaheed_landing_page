<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class CommonQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'answer' , 'image'];

    public function getTranslation($field = '', $lang = false)
    {
        $lang = $lang == false ? App::getLocale() : $lang;
        $common_question_translations = $this->common_question_translations->where('lang', $lang)->first();
        return $common_question_translations != null ? $common_question_translations->$field : $this->$field;
    }

    public function common_question_translations()
    {
        return $this->hasMany(CommonQuestionTranslation::class);
    }

    public function updateTranslations($reqeust)
    {
        $locales = ['sa', 'en'];
        foreach ($locales as $locale) {
            $locale_for_reuest = $locale != 'en' ? 'ar' : 'en';
            $question = 'question_' . $locale_for_reuest;
            $answer = 'answer_' . $locale_for_reuest;
            CommonQuestionTranslation::query()->updateOrCreate([
                'common_question_id' => $this->id,
                'lang' => $locale,
            ], [
                'common_question_id' => $this->id,
                'lang' => $locale,
                'question' => $reqeust->$question,
                'answer' => $reqeust->$answer,
            ]);
        }
    }
}
