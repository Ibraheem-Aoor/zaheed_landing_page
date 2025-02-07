<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lang', 'bank_id'];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
