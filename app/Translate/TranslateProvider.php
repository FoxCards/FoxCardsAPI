<?php

namespace App\Translate;

use App\Translation;
use App\Crypt\CryptProvider;
use App\Translate\YandexTranslateAPI;

class TranslateProvider {
	static function translate($fromToLangs, $wordCrypt){
		$word = app('crypt')->decrypt($wordCrypt);
		if(!$word){
			return [
				'status'=>'error',
				'message'=>'Bad crypt'
			];
		}
		$cached = Translation::where('langs',$fromToLangs)->where('word',$word)->first();
		if($cached){
			return $cached;
		} else {
			return YandexTranslateAPI::getTranslation($fromToLangs, $word);
		}
	}
}