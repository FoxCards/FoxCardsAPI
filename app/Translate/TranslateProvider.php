<?php

namespace App\Translate;

use App\Translation;
use App\Translate\YandexTranslateAPI;

class TranslateProvider {
	static function translate($fromToLangs, $word){
		$cached = Translation::where('langs',$fromToLangs)->where('word',$word)->first();
		if($cached){
			return $cached;
		} else {
			return YandexTranslateAPI::getTranslation($fromToLangs, $word);
		}
	}
}