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
