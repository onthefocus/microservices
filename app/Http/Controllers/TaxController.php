<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class TaxController extends Controller
{
    public function surplus(Request $request)
    {
        $state = $request['state'] ?? 'Florida';
        $type = $request['type'] ?? 'new';
        $agency_fee = $request['agency_fee'] ?? 0;
        $underwriting_fee = $request['underwriting_fee'] ?? 0;
        $premium =  $request['premium'] ?? 0;
        $tax_basis = $premium + $agency_fee + $underwriting_fee;
        
        $taxes = [
            
            'Alabama'=> [ 'tax' => 0.06, 'fee' => 0],
            'Alaska'=> [ 'tax' => 0.027, 'fee' => 0.01],
            'Arizona'=> [ 'tax' => 0.03, 'fee' => 0.002],
            'Arkansas'=> [ 'tax' => 0.04, 'fee' => 0],
            'Florida'=> [ 'tax' => 0.0494, 'fee' => 0.0002, 'empa' => 200]
        ];

        $surplus_tax_rate = data_get($taxes[$state],'tax',0);
        $stamping_fee_rate = data_get($taxes[$state],'fee',0);
        $empa = data_get($taxes[$state],'empa',0);
       
        $surplus_tax = $tax_basis * $surplus_tax_rate;
        $stamping_fee = $tax_basis * $stamping_fee_rate;

        $total =  $tax_basis +  $surplus_tax + $stamping_fee;


        $response = [
            'agency_fee' => $agency_fee,
            'premium' => $premium,
            'underwriting_fee'=> $underwriting_fee,
            'surplus_tax_rate' => $surplus_tax_rate,
            'stamping_fee_rate' => $stamping_fee_rate,
            'surplus_tax' => $surplus_tax,
            'stamping_fee' => $stamping_fee,
            'empa' => $empa,
            'total' => $total,
            'tax_basis' => $tax_basis,
            'type' => $type,
            'state' => $state,

        ];
        return  $response;
    }
    
  
}
