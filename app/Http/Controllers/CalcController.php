<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class CalcController extends Controller
{
    public function builders(Request $request)
    {
        $limit = $request['limit'] ?? 100000;

        $construction_rate = 0.0004;
        $liability_rate = 0.00025;

        $construction_premium = $limit * $construction_rate;
        $liability_premium = $limit * $liability_rate;
        $soft_deductible = 1000;
        $hard_deductible = 800;

        $response = [
            'limit' => $limit,
            'construction_rate' => $construction_rate,
            'liability_rate' => $liability_rate,
            'soft_deductible' => $soft_deductible,
            'hard_deductible' => $hard_deductible,
            'construction_premium' => $construction_premium,
            'liability_premium' => $liability_premium, 

        ];
        return  $response;
    }
    
  
}
