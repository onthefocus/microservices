<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClaimsController extends Controller
{
    private function getLine($year) {
        $claims = random_int(0, 2);
        $line = [
            'year'=> $year,
            'excess' => $claims?random_int(1, 10)*100:null,
            'claims' => $claims,
            'outstanding' => $claims? random_int(1, 10)*500:null,
            'paid' => $claims?random_int(1, 10)*200:null
        ];

        return $line;
    }

    private function getResult(string $policy='') {
        $year = date("Y");

        $result = [
            'policy' => $policy,
            'lines' => 
             [
               0 => $this->getLine($year-1),
               1 => $this->getLine($year-2),
               2 => $this->getLine($year-3),
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
