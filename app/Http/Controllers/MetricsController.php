<?php

namespace App\Http\Controllers;

use App\MetricRecord;
use Illuminate\Http\Request;

class MetricsController extends Controller
{
    public function firstIn(Request $request){
        $metric = new MetricRecord();
        $metric->meta = json_encode($request->all());
        $metric->save();
        return [
            'status'=>'ok'
        ];
    }
}
