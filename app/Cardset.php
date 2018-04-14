<?php

namespace App;

class Cardset extends BaseModel
{
    protected $appends = ['words_count'];

    public function words(){
        return $this->hasMany(\App\Word::class);
    }

    public function language(){
        return $this->belongsTo(\App\Language::class);
    }

    public function getWordsCountAttribute(){
        return $this->words()->count();
    }

    public function addWord($word_text, $translation, $transcription){
        $word = new Word();
        $word->word = $word_text;
        $word->translation = $translation;
        $word->transcription = $transcription;
        $word->language()->associate($this->language);
        $word->cardset()->associate($this);
        $word->save();
        return $word;
    }
}
