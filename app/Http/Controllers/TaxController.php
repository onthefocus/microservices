<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class TaxController extends Controller
{
    public function surplus(Request $request)
    {
        $state = $request['state'];
        $type = $request['type'];
        $agency_fee = $request['agency_fee'] ?? 0;
        $underwriting_fee = $request['underwriting_fee'] ?? 0;
        $premium =  $request['premium'] ?? 0;
        $surplus_tax = 100;
        $stamping_fee = 50;
        $total = $premium + $agency_fee + $underwriting_fee +  $surplus_tax + $stamping_fee;
        
        $response = [
            'agency_fee' => $agency_fee,
            'premium' => $premium,
            'underwriting_fee'=> $underwriting_fee,
            'surplus_tax' => $surplus_tax,
            'stamping_fee' => $stamping_fee,
            'total' => $total,
            'type' => $type,
            'state' => $state,

        ];
        return  $response;
    }
    
    public function post(Request $request)
    {
        
        $search = $request['company_name'];
        $token = $request->bearerToken();
        
        $response = Http::withBasicAuth($token, '')->get('https://api.company-information.service.gov.uk/search/companies',
        [
            'q' => $search 
        ]);

        if ($response->successful()) {
            $response = $response['items'][0];
            $company_number = $response['company_number'];
            $directors = Http::withBasicAuth($token, '')->get('https://api.company-information.service.gov.uk/company/'.$company_number.'/officers');
            if ($directors->successful()) {
            $summary = '';
               foreach ($directors['items'] as $value) {
                $response['directors'] = $value;
                $summary .= 
                str_pad(data_get($value, 'name'),35) ." | ".
                str_pad(data_get($value, 'nationality'),15)." | ".
                str_pad(data_get($value,'occupation'),20)." | ".
                str_pad(data_get($value,'appointed_on'),12). ' - '.
                str_pad(data_get($value,'resigned_on'),12).PHP_EOL ;
               }
               $response['directors_summary'] = $summary;
            }

        }  
        return $response;
    }
}
