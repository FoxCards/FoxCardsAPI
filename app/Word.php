<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\OnlyActive;

class Word extends BaseModel
{
    protected $fillable = ['word', 'translation', 'transcription'];
    protected static function boot(){
        parent::boot();
        static::addGlobalScope(new OnlyActive);
    }

    public function language(){
        return $this->belongsTo(\App\Language::class);
    }

    public function cardset(){
        return $this->belongsTo(\App\Cardset::class);
    }
}
