<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankTranslation extends Model
{

  public function bank(){
    return $this->belongsTo(Bank::class);
  }
}