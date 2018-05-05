<?php

namespace App\Translate;

use \App\Translation;

class YandexTranslateAPI {
	static function getTranslation($fromToLangs, $word){
		$result = JSON_DECODE(file_get_contents(self::composeUrl($fromToLangs, $word)));
		if($result && ($result->code === 200)){
			return self::response($result, $word);
		} else {
			return ['status'=>'error', 'message'=>'Yandex API error'];
		}
	}

	static function composeUrl($fromToLangs, $word){
		// TODO: Security cecks
		$y_key = env('YANDEX_API_KEY');
		$url = "https://translate.yandex.net/api/v1.5/tr.json/translate?format=plain&key=$y_key&text=$word&lang=$fromToLangs";
		return $url;
	}

	static function response($data, $word){
		if(!$data->text[0]){
			return ['status'=>'error', 'message'=>"No translation"];
		}
		$translation = new Translation();
		$translation->langs = $data->lang;
		$translation->translation = $data->text[0];
		$translation->word = $word;
		$translation->save();
		return $translation;
	}
}