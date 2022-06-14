<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClaimsController extends Controller
{
    private function getLine($year) {
        $claims = random_int(0, 2);
        $out = $claims? random_int(1, 10)*500:null;
        $paid = $claims?random_int(1, 10)*200:null;
        $line = [
            'year'=> $year,
            'excess' => $claims?random_int(1, 10)*100:null,
            'claims' => $claims,
            'outstanding' => $out,
            'paid' => $paid,
            'total' => $out + $paid
        ];

        return $line;
    }

    private function getResult(string $policy='') {
        $year = date("Y");

        $result = [
            'policy' => $policy,
            'lines' => 
             [
                (string) Str::uuid() => $this->getLine($year-1),
                (string) Str::uuid() => $this->getLine($year-2),
                (string) Str::uuid() => $this->getLine($year-3),
             ]
           
        ];
        return $result;
    }

    public function post(Request $request)
    {
        $policy = $request['policy_no'];
        return $this->getResult($policy);
    }
}
