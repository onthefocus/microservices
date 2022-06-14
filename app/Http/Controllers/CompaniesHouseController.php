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

        }  
        return $response;
    }
}
