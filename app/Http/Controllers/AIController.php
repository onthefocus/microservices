<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    public function fnolLink(Request $request) {
        $response = json_encode($request->all(), JSON_NUMERIC_CHECK);
        // do response convertion to the $url link

        return $response;
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
    private function getDocument(string $quote_id, string $document_id) {
        $url = 'https://broker.insly.site/api/';

        $authorizationBody = [
            'email' => 'supervisor@insly.com',
            'password' => 'admin1234'

        ];

        $response = Http::withBody(json_encode($authorizationBody), 'application/json')->post($url.'login');

        $token = $response['access_token'];

        $document = Http::withToken($token)->get($url.'quotes/'.$quote_id.'/documents/'.$document_id);
        return $document;

    }
    public function initiate(Request $request)
    {
 
        $url = 'https://api.docparser.com/v1/'; 

        $token = $request->bearerToken();
        $headers = ['api_key' => $token];

        $parser_id = $request['parser_id'];
        if (empty($parser_id)) return response()->json(['error' => 'Required parameter value is not provided: (parser_id)'], 404);

        $document_id = $request['document_id'];
        if (empty($document_id)) return response()->json(['error' => 'Required parameter value is not provided: (document_id)'], 404);

        $quote_id = $request['quote_id'];
         if (empty($quote_id)) return response()->json(['error' => 'Required parameter value is not provided: (quote_id)'], 404);

        $media_id = $request['media_id'];

        if (empty($media_id)) {

            // Get Q&B document content
            $document = $this->getDocument($quote_id, $document_id);
            
        
            // Upload document to the DocParser
            $response = Http::withHeaders($headers)
            ->attach('file', $document, 'offer-'.$document_id.'.pdf')
            ->post($url.'document/upload/'.$parser_id);

            $status = $response->successful();
            
            if ($status) $media_id = $response['id'];
        } else {
            $status = true;
        }

        if ($status) {
          
            $results = [];
            for ($i=0; $i < 10; $i++) { 
                $results = Http::withHeaders($headers)
                ->post($url.'results/'.$parser_id.'/'.$media_id);
                if (empty($results['error'])) {
                    return $results[0];
                } 
                sleep(1);
            }
          

            return $results;

        } else {
            return $response;
        }
        
        
    }
}
