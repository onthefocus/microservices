<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class CompaniesHouseController extends Controller
{
    
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
               foreach ($directors['items'] as $value) {
                $response['directors'][] = $value;
                $response['directors_summary'][] = 
                data_get($value, 'name') ." | ".
                data_get($value, 'nationality')." | ".
                data_get($value,'occupation')." | ".
                data_get($value,'appointed_on'). ' - '.
                data_get($value,'resigned_on') ;
               }
            }

        }  
        return $response;
    }
}
