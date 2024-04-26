<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class AIModelController extends Controller
{
    
    public function calculate(Request $request)
    {

        $response = [
            'result' => 'success',
            'data' => request()->all() 
        ];
   
        return $response;
    }
 
}
