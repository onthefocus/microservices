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
        $ergo = data_get($data, 'prices.ergo',[]);
        $interrisk = data_get($data, 'prices.interrisk',[]);

        foreach (data_get($ergo,'multi',[]) as $key => $value) {
            $ergo[$key]['ac'] = data_get($value,'value',0)*0.22;
            $ergo[$key]['oc'] = 300;
            $ergo['total'] += $ergo[$key]['ac'] + $ergo[$key]['oc'];
        }

        foreach (data_get($interrisk, 'multi',[]) as $key => $value) {
            $interrisk[$key]['ac'] = data_get($value,'value',0)*0.32;
            $interrisk[$key]['oc'] = 300;
            $interrisk['total'] += $interrisk[$key]['ac'] + $interrisk[$key]['oc'];
        }

   

        $response = [
            'prices'=> [
                'ergo' => ['multi' => $ergo],
                'interrisk' => ['multi' => $interrisk]
            ]
        ];
        return  $response;
    }
    
  
}
