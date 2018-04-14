<?php

namespace App;

class Language extends BaseModel
{
    protected $with = ['cardsets'];

    public function cardsets(){
        return $this->hasMany(\App\Cardset::class);
    }
}
