<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AIModelController extends Controller
{
    
    public function calculate(Request $request)
    {

        $response = [
            'result' => 'Risk of you getting into an accident is 10.5%.',
            'data' => request()->all() 
        ];
       // $this->storeRequestData($response);

        //store request data parameters to json file on disk
        
        
   
        return $response;
    }

    private function storeRequestData($data)
    {
      
        
        // get current date and time as string
        $now = date('Y-m-d H:i:s ');


        $filename = $now.Str::random(40) . '.json';


        Storage::disk('public')->put($filename, json_encode($data));
      

    }
 
}
