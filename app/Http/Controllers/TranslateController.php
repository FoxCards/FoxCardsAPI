<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Translate\TranslateProvider;

class TranslateController extends Controller
{
    function translate(Request $request){
        $data = $request->validate([
            'lang'=>'required|string',
            'text'=>'required|string'
        ]);
        return TranslateProvider::translate($data['lang'], $data['text']);
    }
}
