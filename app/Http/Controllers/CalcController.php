<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class CalcController extends Controller
{
    public function builders(Request $request)
    {
        $limit = $request['limit'] ?? 0;
        $rate = 0.004;
        $min = 250;
        $premium = $limit * $rate;

        if ($premium < $min) {
            
            $premium = $min;
        }

        $response = [
            'limit' => $limit,
            'rate' => $rate,
            'premium' => $premium,
            'min' => $min, 

        ];
        return  $response;
    }
    
  
}
