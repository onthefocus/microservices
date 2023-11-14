<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Storage;


class ChatGPTController extends Controller
{

    private function getDocument(string $quote_id, string $document_id, string $url) {
        $url = 'https://'.$url.'/api/';

        $authorizationBody = [
            'email' => 'supervisor@insly.com',
            'password' => 'admin1234'

        ];

        $response = Http::withBody(json_encode($authorizationBody), 'application/json')->post($url.'login');

        $token = $response['access_token'];

        $document = Http::withToken($token)->get($url.'quotes/'.$quote_id.'/documents/'.$document_id);
        return $document;

    }

    public function chat(Request $request) {

        $promptContext = data_get($request,'prompt.content', null);

        if (empty($promptContext)) {
            return response()->json(['error'=>'Prompt value is empty', 'message'=> 'Please provide (prompt.content) value in request payload.'], 401);  ;
        }

        $promptPrefix = data_get($request,'prompt.prefix','Extract');
        $promptSufix  =  data_get($request,'prompt.sufix', 'from file as JSON format from given text:');
        
        $fullPrompt = $promptPrefix. ' '. $promptContext .' '.$promptSufix. ' ';

        $temperature = data_get($request,'parameters.temperature',0.7);
        $maxTokens = data_get($request,'parameters.max_tokens',150);

        $documentID = data_get($request,'parameters.document_id',null);
        $testMode = data_get($request,'parameters.test_mode',false);

        if (empty($documentID)) {
            return response()->json(['error'=>'Document ID value is empty', 'message'=> 'Please provide document id (parameters.document_id) value in request payload.'], 401);  ;
        }

        $quoteID = data_get($request,'parameters.quote_id',null);

        if (empty($quoteID)) {
            return response()->json(['error'=>'Quote ID value is empty', 'message'=> 'Please provide quote id (parameters.quote_id) value in request payload.'], 401);  ;
        }

        $instanceURL = data_get($request,'parameters.instance_url',null);

        if (empty($instanceURL)) {
            return response()->json(['error'=>'Q&B instance value is empty', 'message'=> 'Please provide instance url (parameters.instance_url) value in request payload.'], 401);  ;
        }

        $token = env('CHAT_GPT_TOKEN', null);

        if (empty($instanceURL)) {
            return response()->json(['error'=>'Open AI token is misssing', 'message'=> 'Please set valid Open AI API token in ENV file.'], 401);  ;
        }
   

        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile(public_path('pdf').'/Policy.pdf');

        $fileText = $pdf->getText();
     
        
        $payload = [
            "model" => "gpt-3.5-turbo",
            'messages' => [
                [
                   "role" => "user",
                   "content" => $fullPrompt.$fileText
               ]
            ],
            'temperature' =>  $temperature,
            "max_tokens" => $maxTokens,
            "top_p" => 1.0,
            "frequency_penalty" => 0.52,
            "presence_penalty" => 0.5,
            "stop" => ["11."],
        ];
        
        $data = '[]';

        if ($testMode == false) {
            $response = Http::withToken($token)->post("https://api.openai.com/v1/chat/completions", $payload);
            
            if ($response->failed()) {
            return response()->json(['status'=>400, 'error'=>'Error of Open AI API'], 401);  ;
            }
            $content = $response->json();

            $data = data_get($content,'choices.0.message.content');
        } 

        return  response()->json([
            'input' => [ 'prompt' => $fullPrompt, 'text' => $fileText, 'test_mode' => $testMode ], 
            'output'=> json_decode($data) 
            ]
            , 200); 

    }
}
