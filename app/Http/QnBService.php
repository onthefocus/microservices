<?php

namespace App\Http;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Client;
use App\Models\Quote;
use App\Models\Schema;

use Illuminate\Support\Arr;

class QnBService 
{
    private string $token;
    private string $url;


    public function __construct(string $url = null) {
        $this->url = $url ?? env('QUOTEBIND_URL', '');


        $this->authorize();

    }

    private function authorize($email=null, $password=null) 
    {
     
        $authorizationBody = [
            'email' => $email ?? env('QUOTEBIND_LOGIN_EMAIL', ''),
            'password' => $password ?? env('QUOTEBIND_LOGIN_PASSWORD', ''),

        ];
     

        $response = Http::withBody(json_encode($authorizationBody), 'application/json')->post($this->url.'login');
     

        $this->token = $response['access_token'];
    
    }



    public function executeQuoteIntegration(string $quote_id, string $integration) {
        $payload = ['integration' => $integration ];
        
        $response = Http::withToken($this->token)->withBody(json_encode($payload), 'application/json')
        ->post($this->url.'quotes/'.$quote_id.'/api-integrations/execute');
             
        return $response;
    }

    public function getEntities() {

        $response = Http::withToken($this->token)->get($this->url.'entities');
        if ($response->failed()) return null;
        
        return $response;
    }

    public function getView(string $name) {
        $fullurl = $this->url.'db-views/'.$name;
        $response = Http::withToken($this->token)->get($fullurl);

        if ($response->failed()) return null;
        
        return $response->json();
    }
    
   



    public function getDocumentFile(string $quote_id, string $document_id) {
  
        $response = Http::withToken($this->token)->get($this->url.'quotes/'.$quote_id.'/documents/'.$document_id);
        if ($response->failed()) return null;

        return $response;
    }

    public function getQuoteDocuments(string $quote_id, string $tag=null) {
  
        $response = Http::withToken($this->token)->get($this->url.'quotes/'.$quote_id.'/documents');
     

        if ($response->failed()) return null;
        $documents = data_get($response,'data',[]);

        if ($tag) {
            $items = [];
            foreach($documents as $document){
                if (data_get($document,'type.tag')==$tag) {
                    $items[] = $document;
                }
            }
            $documents = $items;
        }

        return $documents;
    }

  

    public function changeQuoteStatus(string $quote_id, string $status) {
        $payload = [ 'status' => $status];

        $response = Http::withToken($this->token)->withBody(json_encode($payload), 'application/json')
        ->put($this->url.'quotes/'.$quote_id.'/change-status');

        return $response;
    }
}
