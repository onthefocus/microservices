<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class MicroFleetController extends Controller
{
    public function fleet(Request $request)
    {
        $data = $request->all();
        $ergo = data_get($data, 'prices.ergo.multi',[]);
        $interrisk = data_get($data, 'prices.interrisk.multi',[]);

        $response =  ['prices'=> [
            'ergo' => ['multi' => [] , 'totalPremium' => 0],
            'interrisk' =>  ['multi' => [] , 'totalPremium' => 0],
            ]
        ];


        foreach ($ergo as $key => $value) {
            $ac =  round(data_get($value,'value',0)*0.22,2);
            data_set($response, 'prices.ergo.multi.'.$key.'.ac', $ac);
            $oc = 300;
            data_set($response, 'prices.ergo.multi.'.$key.'.oc', $oc);
            data_set($response, 'prices.ergo.multi.'.$key.'.total', $oc+$ac);
            data_set($response, 'prices.ergo.totalPremium', data_get($response, 'prices.ergo.totalPremium',0) + $ac + $oc);
        }

        foreach ($interrisk as $key => $value) {
            $ac =  round(data_get($value,'value',0) * 0.28,2);
            data_set($response, 'prices.interrisk.multi.'.$key.'.ac', $ac);
            $oc = 300;
            data_set($response, 'prices.interrisk.multi.'.$key.'.oc', $oc);
            data_set($response, 'prices.interrisk.multi.'.$key.'.total', $ac+ $oc);
            data_set($response, 'prices.interrisk.totalPremium', data_get($response, 'prices.interrisk.totalPremium',0) + $ac + $oc);
        }

       
        return  $response;
    }
    
  
}
