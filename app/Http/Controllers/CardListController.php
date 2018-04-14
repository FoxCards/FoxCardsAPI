<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Cardset;
use App\Word;

class CardListController extends Controller
{
    public function index(Request $request){
        return Language::all();
    }

    public function cardset(Request $request, Cardset $cardset){
        return $cardset->load('words');
    }

    public function addCardset(Request $request){
        return response('unavailable',410);
    }

    public function addWord(Request $request, Cardset $cardset){
        $word_data = $this->validate($request,[
            'word'=>'required_without_all:translation,transcription',
            'translation'=>'required_without_all:word,transcription',
            'transcription'=>'required_without_all:translation,word',
        ]);
        $word = new Word($word_data);
        $word->language()->associate($cardset->language);
        $word->cardset()->associate($cardset);
        $word->is_active = false;
        $word->save();
        return [
            'status' => 'ok',
            'data'   => $word
        ];
    }
}
